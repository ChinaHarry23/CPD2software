package CPD2.scworker


import android.content.Context
import android.content.Intent
import android.os.Bundle
import android.view.View
import android.widget.TextView
import android.widget.Button
import android.widget.ProgressBar
import androidx.appcompat.app.AppCompatActivity
import androidx.core.content.ContextCompat
import com.android.volley.Response
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley
import com.google.android.material.textfield.TextInputEditText
import org.json.JSONException
import org.json.JSONObject



class Login : AppCompatActivity() {

        var fullname : String = ""
        var email : String = ""
        var apiKey : String = ""
        var aphone : String = ""

    override fun onCreate(savedInstanceState: Bundle?) {
            super.onCreate(savedInstanceState)
            setContentView(R.layout.login_page)

            val phoneInput: TextInputEditText = findViewById(R.id.phone)
            val passwordInput: TextInputEditText = findViewById(R.id.password)
            val loginButton: Button = findViewById(R.id.btLogin)
            val progress: ProgressBar = findViewById(R.id.progress)
            val texterror : TextView = findViewById(R.id.error)
            val sharedPreferences = getSharedPreferences("MyPreferences", Context.MODE_PRIVATE)
            if(sharedPreferences.getString("logged","false").equals("true")){
                val intent = Intent(this, TimeInPage::class.java)
                startActivity(intent)
                finish()
            }
            texterror.visibility = View.GONE
            loginButton.setOnClickListener {
                progress.visibility = View.VISIBLE
                val phone: String = phoneInput.text.toString()
                val password: String = passwordInput.text.toString()
                val queue = Volley.newRequestQueue(applicationContext)
                val url = "http://192.168.100.13/login/login.php"


                val stringRequest: StringRequest =
                    object : StringRequest(
                        Method.POST, url,
                        Response.Listener { response ->
                            progress.visibility = View.GONE
                            try {
                                val jsonObject = JSONObject(response)
                                val status: String = jsonObject.getString("status")
                                val message: String = jsonObject.getString("message")

                                if (status == "success") {
                                    texterror.visibility = View.VISIBLE
                                    texterror.text = "Login Successfully"
                                    texterror.setTextColor(ContextCompat.getColor(this, R.color.green))
                                    fullname = jsonObject.getString("fullname")
                                    email = jsonObject.getString("email")
                                    aphone = jsonObject.getString("phone")
                                    apiKey = jsonObject.getString("apiKey")

                                    val editor = sharedPreferences.edit()
                                    editor.putString("logged", "true")
                                    editor.putString("fullname", fullname)
                                    editor.putString("email", email)
                                    editor.putString("phone", aphone)
                                    editor.putString("apiKey", apiKey)
                                    editor.apply()

                                    val intent = Intent(this, TimeInPage::class.java)
                                    startActivity(intent)
                                    finish()
                                } else {
                                    texterror.text = message
                                    texterror.visibility = View.VISIBLE
                                }

                            } catch (e: JSONException) {
                                e.printStackTrace()
                            }
                        },
                        Response.ErrorListener { error ->
                            progress.visibility = View.GONE
                            texterror.text = "Error: ${error.message}"
                            texterror.visibility = View.VISIBLE
                        }) {
                        override fun getParams(): Map<String, String>? {
                            val paramV: MutableMap<String, String> = HashMap()
                            paramV["phone"] = phone
                            paramV["password"] = password
                            return paramV
                        }
                    }
                queue.add(stringRequest)
            }

            val signupButtonL: Button = findViewById(R.id.btSignupL)
            signupButtonL.setOnClickListener {
                val intent = Intent(this@Login, Signup::class.java)
                startActivity(intent)
                finish()
            }
            val linkTextView: TextView = findViewById(R.id.linkTextView)
            linkTextView.setOnClickListener {
                val intent = Intent(this@Login, forgotPass_Verify::class.java)
                startActivity(intent)
                finish()
            }
        }
    }

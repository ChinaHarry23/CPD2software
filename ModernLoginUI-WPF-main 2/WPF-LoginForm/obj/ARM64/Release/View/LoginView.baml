   M S B A M L   `   `   `  ���� H  DWPF-LoginForm, Version=1.0.0.0, Culture=neutral, PublicKeyToken=null7 clr-namespace:WPF_LoginForm.ViewWPF_LoginForm.View  "    WPF_LoginForm.View.LoginView   R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35\ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     @d2http://schemas.microsoft.com/expression/blend/2008     Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     2local clr-namespace:WPF_LoginForm.View     -     � Title$  	LoginView��$	��550��$	��800�� � WindowStyle$
 None=� � 
ResizeMode$ NoResize=� � WindowStartupLocation$ CenterScreen=�
������  � AllowsTransparency . .����  �� CornerRadius$ 12������  �� ImageSource$ /Images/background.jpg�� j� Stretch$
 None=�._��� $ 10��$��2q� J� Opacity$
 0.95Q����� 	 �� 
StartPoint$		 0,0&�
 �� EndPoint$	
 1,1&�.���  � Color$ #1264A3�� � Offset$ 0Q�� $ White��$	 0.5Q�� $ #2D80B4��$ 1Q����� $		 0,1&�$	
 1,0&�.��� $ #0688D1��$ 0Q�� $ White��$
 0.75Q�._��  � RowDefinitions �� $��30 ��� .+�� $��0�� � ColumnDefinitions �� �� $��25 ��� $��25 ��� $��5 �.+��� $��LOG IN��
�������$��10(�$��
Montserrat)�$��0��$��Center=�$��10,0,0,0q��� -    ��Name$ btnMinimize��$��0q�$��-��
�������$��16(�$��
Montserrat)� � Cursor$
 Hand��$��1������  �� 
TargetType" ��.���  �� Property � �� �� Value �#28AEED �� Triggers P�  P� Property �@J�IsMouseOver P� Value . . ���  � �� �#278BEF����  �� 
TargetType" ��.R��� $��18��$��18��$ 9��#��z��._��� $��Center=�$��Center=��� -   $ btnClose��$��0q�$��X��
�������$��12(�$��
Montserrat)�$
 Hand��$��2������ " ��.���  � �� �#DA34AE P�  �@J�IsMouseOver . . ���  � �� �#C62DAE���� " ��.R��� $��18��$��18��$ 9��#��z��._��� $��Center=�$��Center=��� $��/Images/Logo.png��$	��352��$	��238��$��UniformToFill=�$
��Left=�$	��Top=�$��228,-30,0,0q�$��2���� $��1�� �� Orientation$ Vertical=�$��299,148,288,0q�.+��� $��Username�����#06A5FF$��20(�$��Medium"�$��
Montserrat)�$��0,35,0,0q��� -    ��Name$ txtUser��$��13(�$��Medium"�$��
Montserrat)�
������� �� 
CaretBrush �#06A5FF���#06A5FF$��0,0,0,2q�$��28��$��Center=�$��0,5,0,0q�$��20,0,0,0q�.������ $ /Images/user-icon.png��$
 None=� j� 
AlignmentX$
 Left=�.���� $��Password�����#06A5FF$��20(�$��Medium"�$��
Montserrat)�$��0,15,0,0q�G� -    G�Name$ txtPass��$��15(�$��Medium"�$��
Montserrat)�
������� G� 
CaretBrush �#06A5FF���#06A5FF$��0,0,0,2q�$��28��$��Center=�$��0,5,0,0q�$��20,0,0,0q����� $ /Images/key-icon.png��$
 None=�$
 Left=��� -   $ btnLogin��$��0q�$��LOG IN��
�������$��12(�$��
Montserrat)�$
 Hand��$��61�� J� RenderTransformOrigin$ 0.5,0.5&�z�V� .~��� ��  �� AngleX$ -0.404Q��� T�   T� X$  -0.215Q����� " ��.���  � �� �#06A5FF P�  �@J�IsMouseOver . . ���  � �� �#28AEED���� " ��.R��� $	��150��$��40��$ 20��#��z��._��� $��Center=�$��Center=��� -   $ 	btnSignUp��$��0q�$��SIGN UP��
�������$��12(�$��
Montserrat)�$
 Hand��$��57������ " ��.���  � �� �#06A5FF P�  �@J�IsMouseOver . . ���  � �� �#28AEED���� " ��.R��� $	��150��$��40��$ 20��#��z��._��� $��Center=�$��Center=��� $ 
Horizontal=�$��Center=�$��0,15,0,0q�.+��� $��Forgot Password?��
���   �$��12(�$��Medium"�$��
Montserrat)��� $��
Click here�����#06A5FF$��12(�$��Medium"�$��
Montserrat)�$
 Hand��$��8,0,0,0q�
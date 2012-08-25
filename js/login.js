	window.onload = function(){
		var fm = document.getElementsByTagName('form')[0];
		
		var user = document.getElementById('username');
		var pass = document.getElementById('pass');
		//alert(fm);

		//当鼠标从用户名表单滑过时
		user.onmouseover = function (){
			this.style.backgroundColor='#DEEDEF';
		};
		//当鼠标从用户名表单离开后
		user.onmouseout = function (){
			this.style.backgroundColor='';
		};
		//当鼠标从密码表单滑过时
		pass.onmouseover = function (){
			this.style.backgroundColor='#DEEDEF';
		};
		//当鼠标从用户名表单离开后
		pass.onmouseout = function (){
			this.style.backgroundColor='';
		};

		
		window.onsubmit = function (){
			//判断用户名长度是否符合要求
			if(fm.username.value.length < 2 || fm.username.value.length > 20){
				alert('用户名长度不得小于6位或大于20位!');
				fm.username.value = '';
				fm.username.focus();
				return false;
			}

			//判断用户名是否有非法字符
			if(/[<>\'\"\ \  ]/.test(fm.username.value)){
				alert('用户名不得包含非法字符!');
				form.username.value = "";
				form.username.focus();
				return false;			
			}

			//判断密码长度是否符合要求
			if(fm.pass.value.length < 6 || fm.pass.value.length > 32){
				alert('用户密码不得小于6位或大于32位!');
				fm.pass.value = '';
				fm.pass.focus();
				return false;
			}
			return true;
		};

	};
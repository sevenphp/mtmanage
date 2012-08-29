	window.onload = function (){
		var fm = document.getElementsByTagName('form')[0];
		//alert(fm);
		fm.onsubmit = function (){
			//验证用户名
			if(fm.user.value.length < 2 || fm.user.value.length > 20){
				alert('用户名长度不得小于2位或大于20位!');
				fm.user.value = '';
				fm.user.focus();
				return false;
			}
			//判断用户名是否有非法字符
			if(/[<>\'\"\ \  ]/.test(fm.user.value)){
				alert('用户名不得包含非法字符!');
				form.user.value = "";
				form.user.focus();
				return false;			
			}
			//验证密码
			if(fm.pass.value.length < 6 || fm.pass.value.length > 32){
				alert('用户密码不得小于6位或大于32位!');
				fm.pass.value = '';
				fm.pass.focus();
				return false;
			}

			return true;			
		};

		var aback = document.getElementsByName('back');

		aback[0].onclick = function (){
			history.go(-1);
		};

	};
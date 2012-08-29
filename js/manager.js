	window.onload = function(){
		var logout = document.getElementsByName('logout')[0];
		//alert(logout);

		logout.onclick = function (){
			if(confirm('确定要退出吗?')){
				return true;
			}else{
				return false;
			}
		};


		//删除账号
		var deluser = document.getElementsByName('deluser');
		//alert(deluser);
		if(deluser != undefined){
			for(var i=0;i<deluser.length;i++){
				deluser[i].onclick = function(){
					if(confirm('确定要删除账号?')){
						return true;
					}else{
						return false;
					}
				};				
			}

		}

		//删除部门
		var deldepart = document.getElementsByName('deldepart');
		if(deldepart != undefined){
			for(var i=0;i<deldepart.length;i++){
				deldepart[i].onclick = function(){
					if(confirm('确定要删除部门?')){
						return true;
					}else{
						return false;
					}
				};
			}
		}

		//删除会议记录
		var delmeeting = document.getElementsByName('delmeeting');
		if(delmeeting != undefined){
			for(var i=0;i<delmeeting.length;i++){
				delmeeting[i].onclick = function (){
					if(confirm('确定要删除会议记录?')){
						return true;
					}else{
						return false;
					}
				};
			}
		}

		//添加会议记录的检查
		var fm = document.getElementsByTagName('form')[0];
		if(fm != undefined){
			fm.onsubmit = function (){
				//会议名称长度
				if(fm.mtname.value.length < 2 || fm.mtname.value.length > 20){
					alert('会议名称长度不能小于2位或大于20位!!!!!!');
					fm.mtname.value = '';
					fm.mtname.focus();
					return false;
				}

				//部门名称长度
/*				if(fm.mtdepart.value.length < 0 || fm.mtdepart.value.length > 10){
					alert('部门名称长度不能小于2位或大于10位!!!!!!');
					fm.mtdepart.value = '';
					fm.mtdepart.focus();
					return false;
				}*/

				//会议地址长度
				if(fm.mtaddr.value.length < 2 || fm.mtaddr.value.length > 10){
					alert('会议地址长度不能小于2位或大于30位!!!!!!');
					fm.mtaddr.value = '';
					fm.mtaddr.focus();
					return false;
				}

				//主持人名称长度
				if(fm.mtmanager.value.length <= 0 || fm.mtmanager.value.length > 20){
					alert('主持人名称长度不能为空位或大于20位!!!!!!');
					fm.mtmanager.value = '';
					fm.mtmanager.focus();
					return false;
				}

				//记录人名称长度
				if(fm.mtrecord.value.length <= 0 || fm.mtrecord.value.length > 20){
					alert('记录人名称长度不能为空位或大于20位!!!!!!');
					fm.mtrecord.value = '';
					fm.mtrecord.focus();
					return false;
				}

				//出席人名称长度
				if(fm.mtperson.value.length <= 0 || fm.mtperson.value.length > 50){
					alert('出席人名称长度不能为空位或大于50位!!!!!!');
					fm.mtperson.value = '';
					fm.mtperson.focus();
					return false;
				}

				//会议摘要长度
				if(fm.mtdescibe.value.length <= 0 || fm.mtdescibe.value.length > 50){
					alert('出席人名称长度不能为空位或大于50位!!!!!!');
					fm.mtdescibe.value = '';
					fm.mtdescibe.focus();
					return false;
				}

				return true;
			};
		}
	};

	/*通过classname来获取标签*/
	function getElementsByClassName(className,tagName){  
			var ele=[],all=document.getElementsByTagName(tagName||"*");  
			for(var i=0;i<all.length;i++){  
				if(all[i].className.match(new RegExp('(\\s|^)'+className+'(\\s|$)'))){  
				ele[ele.length]=all[i];  
				}  
			}  
			return ele;  
	}


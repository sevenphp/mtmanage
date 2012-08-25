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
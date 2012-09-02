<?php
	//面向对象
	
	//类的声明
	abstract class Person{	//抽象类

		abstract public function say();
	}

	class Man extends Person{
		private $name;
		private $age;

		public function say(){
			echo '男人会说话';
		}

	}

	class Woman extends Person{

		public function say(){
			echo '女人也会说话';

	}

/*		private function __set($key,$value){
			$this->key = $value;
		}

		private function __get($value){
			echo $this->value;
		}*/
	}


	//实例化一个对象
	$man1 = new Man();

	$man1->say();

	$woman1 = new Woman();

	$woman1->say();


?>
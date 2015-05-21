<?php

class stack
{
	var $top=-1;
	var $stack=array(20);

function pop() {
			$a;
			if($this->top>0){
			$a=$this->stack[$this->top];
			$this->top--;
			return $a;}
			return null;
			}
function push($val) {
			$this->top++;
			$this->stack[$this->top] = $val;
		}
}
function prec($symbol)
{
	switch($symbol)
	{
		case '+':
		case '-': { return 2;break;}
		case '*':
		case '/': { return 4;break;}
		case '$':
		case '^': { return 6;break;}
		case '#':
		case '(':
		case ')': { return 1;break;}
	}
}
function isoperator($symbol)
{
	switch($symbol)
	{
		case '+':
		case '-':
		case '*':
		case '/':
		case '^':
		case '$':
		case '#':
		case '(':
		case ')':	{ return 1;break;}
		default:	return 0;
	}
}
function inf_pre($infix,$prefix)
{
	$s = new stack;
	//$top=-1;
	$i=0;$j=0;
	$symbol;
	//$s->stack[++$s->top]='#';
	//$s->top++;
	$s->push('#'); 
	
	//strrev($infix);
	for($i=0;$i<strlen($infix);$i++)
	{
		$symbol=$infix[$i];
		if(isoperator($symbol)==0)
		{
			$prefix[$j]=$symbol;
			$j++;
		}
		else if($symbol=='(')	$s->push($symbol);
		else if($symbol==')')
		{
			while($s->stack[$s->top]!='('&&$s->top>0)
			{
				
				$prefix[$j]=$s->pop();
				$j++;
			}
			$s->pop();
		}
		else
		{
			if(prec($s->stack[$s->top])<=prec($symbol))
			{
				$s->push($symbol);
			}
			else
			{
				while(prec($s->stack[$s->top])>=prec($symbol))
				{
					$prefix[$j]=$s->pop();
					$j++;
				}		
				$s->push($symbol);
			}
		}	
	}
	while($s->stack[$s->top]!='#')
	{
		$prefix[$j]=$s->pop();
		$j++;
	}		
	return implode(" ",$prefix);
}

function power($op1,$op2)
{
	$i;$ans=1;
	for($i=0;$i<$op2;$i++)
		$ans=$ans*$op1;
	return $ans;
}

function operation($op1,$op2,$op)
{
	switch($op)
	{
		case '+': {return $op1+$op2;}
		case '-': {return $op1-$op2;}
		case '*': {return $op1*$op2;}
		case '/': {return $op1/$op2;}
		case '^': 
		case '$': {return power($op1,$op2);}
	}
	return -1;
}

	$s1 = new stack;
	$infix=array(20);
	$prefix=array(20);
	$temp;
	$i;$j=-1;
	$infix="((a+b)*(c-d))/(a+b-c/d)*(c^d)";
	$temp=inf_pre($infix,$prefix);
	
	//echo strrev($temp);
	echo "<br>";
	echo "expression is  ".$infix,"<br>";
	$exp=array(20);
	$st=array(20);
	$op1;$op2;
	$op;
	$exp=$temp;
	
	echo $exp,"<br>";
	echo "<br>";
	for($i=0;$i<=strlen($exp)-1;$i++)
	{
	if($exp[$i]=='+'||$exp[$i]=='-'||$exp[$i]=='*'||$exp[$i]=='/'||$exp[$i]=='^'||$exp[$i]=='$')
	{
		$op=$exp[$i];
		$op1=$st[$j];
		$j--;
		$op2=$st[$j];
		echo $op2,$op,$op1,"<br>";
		//$st[$j]=operation($op1,$op2,$op);
		$st[$j]=$op2.$op.$op1;
	}
	else if($exp[$i]==' ') 
		continue;
	else
	{
		/*if (is_numeric($exp[$i])) 
			$s->push($exp[$i]);
		else if (array_key_exists($exp[$i], $this->v)) 
			$s->push($this->v[$exp[$i]]);
		else 
			$s->push($vars[$exp[$i]]);*/
		++$j;
		$st[$j]=$exp[$i];
	}
	}
	return $s1->pop();
?>
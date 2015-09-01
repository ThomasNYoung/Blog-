@extends('layouts.master')

@section('content')

<!DOCTYPE html>
<html>
<head>
	<title>Whack-a-Square</title>
	<link rel="stylesheet" href="/css/whack-a-mole.css">
	<!-- <link rel="stylesheet" href="/js/whack-a-mole.js"> -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>
<body>
	<div class='container'>
		<div class='content' id='wrapper'>
		<h1>Click a box</h1>
		<button class='start btn btn-lrg btn-primary btn-block'  id='start'>Rock n Roll!</button>
		<input type='text' id='score' readonly=""> <br>
		<input type='text' id='high score' readonly=''><br>
			<div class='mole second' id='0'></div>
			<div class='mole second' id='1'></div>
			<div class='mole second' id='2'></div>
			<div class='mole second' id='3'></div>
			<div class='mole second' id='4'></div>
			<div class='mole second' id='5'></div>
			<div class='mole second' id='6'></div>
			<div class='mole second' id='7'></div>
			<div class='mole second' id='8'></div>
		</div>
	</div>
	<script>
	'use strict';
	
	
	var random
	var intervalId
	var score = 0
	var interval = 1000
	var done = $('.second')
	
	//this function adds/removes class to populate div box. 
	function popupBox() {
		disable();
		enable();
		$('#score').val("Score: " + score);	
		console.log('hello')
		random = Math.floor(Math.random() * 9)
			$('#' + random).addClass('box')
		setTimeout(function(){ 
			$('#'+ random).removeClass('box')
			},interval);
		playBack();
	};
			
	//calls back popUpBox function at a set interval
	function playBack() {
		clearInterval(intervalId);
	    intervalId = setInterval(function() {
	        popupBox();
	    }, interval);
	};
	
	function enable() {
		$('.mole').on('click', makeItDisappear);
	};
	function disable(){
		$('.mole').off('click');
	}
			
	//removes class from defined in css and adds score  
	function makeItDisappear() {
		if($(this).hasClass('box')){
			$(this).removeClass('box');
			console.log('it works')
			score = score + 10
	    	$('#score').val("score: " + score);
	    	speedUp();
		} else {
			gameOver();
		}
	};

	//causes 'mole' to appear quicker everytime its successfully clicked
	function speedUp() {
		
		interval = interval - 50
		console.log('faster')
	}
		
	//alerts when clicked outside of 'mole'
	function gameOver() {
			
			alert('game over')
			console.log('game over')
		
		location.reload(true);
	}
	        
		
$('#start').click(popupBox);

	</script>
</body>
</html>
@stop         
           
	    


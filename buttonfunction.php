<html>
 <head>
 </head>
 <body>
 <button>Donate</button>
 <td></td>      <td></td> 
  <span id='count'>0</span>
 <script>
 $button = document.querySelector('button');
 $span = document.querySelector('span');
 function increment(){
	 $span.innerHTML++;
 }
 $button.addEventListener('click',increment);
 </script>
 </body>
 </html>
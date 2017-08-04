<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
	libs/jquery/1.3.0/jquery.min.js"></script>
<script>
				function dd(){
				var d = new Date();
				dd=d.getUTCDay();
				mm=d.getMonth();
				if(d.getUTCDay()<10){
					dd='0'+d.getUTCDay();
				} 
				if(d.getMonth()<10){
					mm='0'+d.getMonth();
				} 
				document.write(dd + "/" + mm + "/" + d.getFullYear());
				}
	</script>
	<script>
			function hh(){
				var d = new Date();
				hh=d.getHours();
				min=d.getMinutes();
				sec=d.getSeconds();
				if(d.getHours()<10){
					hh='0'+d.getHours();
				} 
				if(d.getMinutes()<10){
					min='0'+d.getMinutes();
				} 
				if(d.getSeconds()<10){
					sec='0'+d.getSeconds();
				} 
				document.write(hh +":"+ min + ":" + sec);
				}
	</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

 <script>




	 $(document).keydown(function(e){
		 switch (e.which){
			 case 37:    //left arrow key
				 $("div[id^='myModal']").finish().animate({
					 var $currentModal = $(this);
					 currentModal.modal('hide');
					 currentModal.closest("div[id^='myModal']").nextAll("div[id^='myModal']").first().modal('show');
				 });
				 break;
				 break;
			 case 39:    //right arrow key
				 $(".box").finish().animate({
					 currentModal.modal('hide');
					 currentModal.closest("div[id^='myModal']").prevAll("div[id^='myModal']").first().modal('show');
				 });
				 break;
		 }
	 });
 </script>
 <script>
	 function openfolder() {
		 var a;
		 a = document.getElementById("div1");
		 a.innerHTML = "";
		 setTimeout(function () {
			 a.innerHTML = "";
		 }, 1000);
	 }
	 openfolder();
	 setInterval(openfolder, 2000);
 </script>
 <script>
	 var toastElList = [].slice.call(document.querySelectorAll('.toast'))
	 var toastList = toastElList.map(function (toastEl) {
		 return new bootstrap.Toast(toastEl, {delay: 3000})
	 })
	 var notImplError = toastList[0];

	 var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
	 var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
		 return new bootstrap.Popover(popoverTriggerEl)
	 })

	 var myModal = document.getElementById('myModal')
	 var myInput = document.getElementById('myInput')

	 myModal.addEventListener('shown.bs.modal', function () {
		 myInput.focus()
	 })

	 $("[data-toggle=popover]")
			 .popover({html:true})
 </script>
<script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- apps -->
<script src="{{asset('dist/js/app.min.js')}}"></script>
<!-- full sidebar -->
<script>
$(function() {
		"use strict";
		$("#main-wrapper").AdminSettings({
				Theme: false, // this can be true or false ( true means dark and false means light ),
				Layout: 'vertical',
				LogoBg: 'skin4', // You can change the Value to be skin1/skin2/skin3/skin4/skin5/skin6 
				NavbarBg: 'skin6', // You can change the Value to be skin1/skin2/skin3/skin4/skin5/skin6
				SidebarType: 'full', // You can change it full / mini-sidebar / iconbar / overlay
				SidebarColor: 'skin4', // You can change the Value to be skin1/skin2/skin3/skin4/skin5/skin6
				SidebarPosition: false, // it can be true / false ( true means Fixed and false means absolute )
				HeaderPosition: false, // it can be true / false ( true means Fixed and false means absolute )
				BoxedLayout: false, // it can be true / false ( true means Boxed and false means Fluid ) 
		});
});
</script>
<script src="{{asset('dist/js/app-style-switcher.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('assets/extra-libs/sparkline/sparkline.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('dist/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('dist/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('dist/js/custom.js')}}"></script>
<script src="{{asset('assets/extra-libs/prism/prism.js')}}"></script>
{{-- <!--This page JavaScript -->
<!--chartis chart-->
<script src="{{asset('assets/libs/chartist/dist/chartist.min.js')}}"></script>
<script src="{{asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
<!--c3 charts -->
<script src="{{asset('assets/extra-libs/c3/d3.min.js')}}"></script>
<script src="{{asset('assets/extra-libs/c3/c3.min.js')}}"></script>
<!--chartjs -->
<script src="{{asset('assets/libs/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('dist/js/pages/dashboards/dashboard1.js')}}"> --}}
{{-- <script>
	const url = "{{route('notifications.index')}}"
	//console.log(url)
	function autorefresh(){
		fetch(url)
			.then(response=> response.json())
			.then(({notifications}) => {
								
				const notificationContainer = document.querySelector('.message-center');

				let output = ''

				for(let not of notifications){
					let url =''
					if(not.type == 'App\\Notifications\\FacebookLiveRequestSent'){
						 url = "{{route('facebook-lives.show', ':id')}}"
						url = url.replace(':id', not.data.live_id)
						
					}else if(not.type == 'App\\Notifications\\OrderCreated'){
						url = "{{route('orders.show', ':id')}}"
						url =url.replace(':id', not.data.order_id)
					}

					output += '<a href="'+ url +'" class="message-item">'
					 			+ '<span class="btn btn-danger btn-circle"><i class=" fa fa-link"></i></span>'
								+ '<span class="mail-contnet">'
								+ '<h5 class="message-title">'+ not.data.msg +'</h5></span></a>'
				}
				
				notificationContainer.innerHTML = output
				
			})
	}	
	window.load= autorefresh();

	window.setInterval(autorefresh, 30 * 1000);
</script> --}}

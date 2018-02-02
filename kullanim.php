	<style>
	header .menu_alan ul.sub-menu {width: auto !important;margin-top:-100px;opacity: 0;    transition: all 0.5s;}
	.open > .dropdown-menu {margin-top:0px !important;opacity: 1 !important;}
	.dropdown-menu {display: block !important;}
	.open > .dropdown-menu li a {display: block !important;}
	header .menu_alan ul li ul li {width:100%; height:auto; float:left;}
	.open > .dropdown-menu li a {width: 100%; height: auto; float: left;}

	header .menu_alan .altmenuok:after {font-family: FontAwesome;
    content: "\f0dd";
    display: inline-block;
    padding-right: 3px;
    vertical-align: middle;    margin-top: 9px;}
	</style>


    /* JAVASCRİPT TİTİT */ 

    /* JAVA TİTTİgit */ 
		<script>
	  	if( $('ul').hasClass('sub-menu') )
    	{
        var parent = $('ul .sub-menu').parent();
        $('ul .sub-menu').addClass('dropdown-menu');
        parent.addClass('dropdown');
        parent.children(':first-child').attr({'href': '#', 'class': 'dropdown-toggle', 'data-toggle': 'dropdown'});
        }
   		</script>
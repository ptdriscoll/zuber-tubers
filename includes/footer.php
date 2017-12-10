		</div> <!-- .main.container -->
        
        <!--FOOTER--------------------------------------------------------------------------------------->		
	    <footer class="footer">
			<a href="http://www.samedfoundation.org/" target="_blank"><img width="125" height="84" alt="The Healthy Kids Project" src="<?php echo $root; ?>assets/Images/San-Antonio-Medical-Logo.png" /></a>
			<a href="http://www.klrn.org/" target="_blank"><img width="125" height="auto" alt="The Healthy Kids Project" src="<?php echo $root; ?>assets/Images/KLRN_logo_2015.png" /></a>
			<a href="http://www.gottalook.com/" target="_blank"><img width="125" height="66" alt="The Healthy Kids Project" src="<?php echo $root; ?>assets/Images/Gottalook-Productions-Logo.png" /></a>
	    </footer>
	    
	    	<div id="push_footer"></div> 
</div><!-- #push_footer_wrapper -->
			
			<p id="copyright">&copy; <?php echo date('Y') ?> Gottalook Productions LLC</p>

          
		<!--MODAL previewVideoD--------------------------------------------------------------------------------------->			
		<div class="modal fade" id="previewVideo" tabindex="-1" role="dialog" aria-labelledby="modal_title_previewVideo" aria-describedby="modal_body_previewVideo" aria-hidden="true">
		    <div class="modal-dialog">
		        <div class="modal-content">
		
		            <div id="modal_body_previewVideo" class="modal-body"> 
		                        
	                        <div id="video_embed_wrapper" class="embed_wrapper ratio_16-9"> 
	                            <iframe id="previewVideo_iframe" class="global_player" type="" name=""
	                                frameborder="0" marginwidth="0" marginheight="0" scrolling="no"
	                                src=""
	                                allowfullscreen frameborder="0">
	                            </iframe>
	                        </div>
		
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		            </div>
		
		        </div><!--end .modal-content -->
		    </div><!--end .modal-dialog -->
		</div><!-- end .modal -->   
		
		
		<!--SCRIPTS--------------------------------------------------------------------------------------->			
		<script src="<?php echo $root; ?>assets/lib/js/jquery.min.js"></script>
	    <script src="<?php echo $root; ?>assets/lib/js/bootstrap.min.js"></script>
		<script src="<?php echo $root; ?>assets/js/custom.js"></script>
    <script type="text/javascript">
      //load call to YouTube playlist only on English and Spanish home pages
      (function() {
        if (location.pathname == '/zubertubers/' || location.pathname == '/zubertubers/espanol/') {
          var script = document.createElement('script');
          script.src = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=10&playlistId=<?php echo $playlistId; ?>&key=AIzaSyDraaM_dJplqR3JbRtmx-HSIMfIZHTqXV4&callback=displayYouTubeVideosColSizes';
          script.type = 'text/javascript';      
          document.body.appendChild(script);
        }
      }());
    </script>
		          
  </body>
</html>
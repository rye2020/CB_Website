
  <style scoped>
    .rpwe-block li {
       margin-bottom: 0 !important;
       margin-left: 10px;
       padding-bottom: 0 !important;
       list-style-type: disc !important;
       font-weight: bold !important;
}
   .rpwe-clearfix:before, .rpwe-clearfix:after {
       content: none!important;
}
   .rpwe-time {
       color: #7c7c7c !important;
}
   .rpwe-title {
       display: inline;
}
   .rpwe-block a {
       padding-right: 1em;
       font-weight: bold;
}
</style>
<h3 style="text-decoration: underline;"><strong>Recent Posts</strong></h3>
<?php 
   echo rpwe_get_recent_POSTs (array('limit' => 7, 'thumb' => false, 'styles_default' => false));
?>
</aside>
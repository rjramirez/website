
  <!-- Scripts -->
  <?php  foreach($scripts as $script): ?>
    <script type="text/javascript" src="<?php echo base_url().'js/'.$script.'.js'; ?>"></script>
  <?php endforeach; ?> 

<script type="text/javascript">
$(document).ready(function() {
  // var scrollorama = $.scrollorama({ blocks:'.scrollblock', enablePin: false });

  // scrollorama.onBlockChange(function() {
  //   var i = scrollorama.blockIndex;
  //   var scrollId = scrollorama.settings.blocks.eq(i).attr('id');
  //   $('#console')
  //     .css('display','block')
  //     .text('onBlockChange | blockIndex:'+i+' | current block: '+scrollId);
  //   if(scrollId=="contact"){
  //     scrollorama.animate('#contact_h1',{ duration: 400, property:'rotate', start:720 });

  //   }
  // });


  
  $('.portfolio > li').each( function() { $(this).hoverdir(); } );

  $(".fancybox").fancybox({
    openEffect : 'fade',
    openSpeed  : 150,
    
    closeEffect : 'elastic',
    closeSpeed  : 250,

    closeBtn  : false,
    helpers : {
          thumbs : {
            width  : 50,
            height : 50
          },
          title : {
            type : 'inside'
          },
          buttons : {}
        },
    beforeShow: function () {
        $.fancybox.wrap.bind("contextmenu", function (e) {
                return false; 
        });
    },
    afterLoad : function() {
      this.title = (this.title ? this.title : '');
    }
  });
  var $filterType = $('.filter_group button.active').attr('value');
  var $holder = $('ul.portfolio');
  var $data = $holder.clone();
  $('.filter_group button').click(function(e) {
    $('.filter_group button').removeClass('active');
    var $filterType = $(this).attr('value');
    $(this).addClass('active');
    if ($filterType == 'all') {
      var $filteredData = $data.find('li');
    } 
    else {
      var $filteredData = $data.find('li[data-type=' + $filterType + ']');
    }
    $holder.quicksand($filteredData, {
      duration: 800,
      adjustHeight: 'dynamic',
      easing: 'easeInOutQuad'
    });
    return false;
  });
});
</script>

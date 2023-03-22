/*------------------------------------------------------------------------------*/
/*  Home_Page Slider
/*------------------------------------------------------------------------------*/

var revapi2,

  tpj;
  
  jQuery(function() {
    tpj = jQuery;
    if(tpj("#rev_slider_2_1").revolution == undefined){
      revslider_showDoubleJqueryError("#rev_slider_2_1");
    }else{
        revapi2 = tpj("#rev_slider_2_1").show().revolution({
        sliderLayout:"fullwidth",
                visibilityLevels:"1240,1240,778,480",
                gridwidth:"1240,1240,778,480",
                gridheight:"700,700,450,350",
                spinner:"spinner0",
                perspective:600,
                perspectiveType:"global",
                editorheight:"700,768,450,350",
                responsiveLevels:"1240,1240,778,480",
                progressBar:{disableProgressBar:true},
                navigation: {
                  onHoverStop:false,
                  bullets: {
                    enable:true,
                    tmp:"<span class=\"tp-bullet-inner\"></span>",
                    style:"uranus",
                    hide_onmobile:true,
                    hide_under:"1200px",
                    hide_onleave:true,
                    h_align:"right",
                    v_align:"center",
                    h_offset:150,
                    v_offset:0,
                    direction:"vertical"
                  }
                },
                fallbacks: {
                  allowHTML5AutoPlayOnAndroid:true
                },
      });
    }
    
  });



  /* (homepage -2 )*/
  jQuery(function() {
    tpj = jQuery;

    if(tpj("#rev_slider_4_1").revolution == undefined){
        revslider_showDoubleJqueryError("#rev_slider_4_1");

      }else{

        revapi4 = tpj("#rev_slider_4_1").show().revolution({
        sliderLayout:"fullwidth",
          visibilityLevels:"1240,1240,778,480",
          gridwidth:"1240,1240,778,480",
          gridheight:"700,700,450,350",
          spinner:"spinner0",
          perspective:600,
          perspectiveType:"global",
          editorheight:"700,768,450,350",
          responsiveLevels:"1240,1240,778,480",
          progressBar:{disableProgressBar:true},
          navigation: {
            onHoverStop:false,
            touch: {
              touchenabled:true
            },
            bullets: {
              enable:true,
              tmp:"<span class=\"tp-bullet-title\">{{title}}</span>",
              style:"ares",
              hide_onmobile:true,
              hide_under:778,
              hide_onleave:true,
              h_align:"right",
              v_align:"center",
              h_offset:150,
              v_offset:0,
              direction:"vertical"
            }
          },
          fallbacks: {
            allowHTML5AutoPlayOnAndroid:true
          },
      });
    }
  });


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BPC Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
  <style>
    .auth .login-half-bg{
      background-image: url("../../images/industry.jpg")!important;
      background-size: cover!important;
    }
    .home-newsletter {
    padding: 20px 0;
    }

    .home-newsletter .single {
    max-width: 650px;
    margin: 0 auto;
    text-align: center;
    position: relative;
    z-index: 2; }
    .home-newsletter .single h2 {
    font-size: 22px;
    color: #777;
    text-transform: uppercase; }
    .home-newsletter .single .form-control {
    height: 50px;
    background: rgba(255, 255, 255, 0.6);
    border-color: #3f4e5a;
    border-radius: 20px 0 0 20px; }
    .home-newsletter .single .form-control:focus {
    box-shadow: none;
    border-color: #243c4f; }
    .home-newsletter .single .btn {
    min-height: 50px; 
    border-radius: 0 20px 20px 0;
    background: #243c4f;
    color: #fff;
    }

    .reviews{
  padding: 5px 15px;
  max-width: 768px;
  margin: 0 auto;
}

.review-item{
  background-color: white;
  padding: 5px 15px;
  box-shadow: 0px 0px 3px #777;
}

.review-item .review-date{
  color: #cecece;
  font-size: 10px;
}
.review-item .review-text{
  font-size: 12px;
  font-weight: normal;
  color: #343a40;
}

.review-item .reviewer{
  width: 30px;
  height: 30px;
  border: 1px solid #cecece;
}

/****Rating Stars***/
.raterater-bg-layer {
    color: rgba( 0, 0, 0, 0.25 );
}
.raterater-hover-layer {
    color: rgba( 255, 255, 0, 0.75 );
}
.raterater-hover-layer.rated { /* after the user selects a rating */
    color: rgba( 255, 255, 0, 1 );
}
.raterater-rating-layer {
    color: rgba( 255, 155, 0, 0.75 );
}
.raterater-outline-layer {
    color: rgba( 0, 0, 0, 0.25 );
}

/* don't change these - you might break something.. */
.raterater-wrapper {
    overflow:visible;
}

.software .raterater-wrapper {
    margin-top: 4px;
}

.raterater-layer,
.raterater-layer i {
    display: block;
    position: absolute;
    overflow: visible;
    top: 0px;
    left: 0px;
}
.raterater-hover-layer {
    display: none;
}
.raterater-hover-layer i,
.raterater-rating-layer i {
    width: 0px;
    overflow: hidden;
}

  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 login-half-bg d-flex align-items-center justify-content-center">
              <div class="row w-100 mx-0">
                  <div class="col-lg-8 mx-auto">
                    
                   
                    <div class="auth-form-light text-left py-2 px-4 px-sm-5">
                        <h2 style="text-align: center; margin-bottom: 15px; color: rgb(36, 34, 112); text-shadow: 0px 0px 3px #777;">BSCIC E-Registration System</h2>
                      <div class="brand-logo" style="text-align: center;">
                        <img src="../../images/bsic.png" alt="logo">
                      </div>
                      <h6 class="font-weight-light" style="text-align: center;">Sign in to continue</h6>
                      <form class="pt-3">
                        <div class="form-group">
                          <input type="email" class="form-control form-control-sm" id="exampleInputEmail1" placeholder="Username">
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control form-control-sm" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="mt-3">
                          <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../pages/user/index.html">SIGN IN</a>
                          <a class="btn btn-block btn-warning btn-lg font-weight-medium auth-form-btn" href="../../pages/user/signup.html">SIGN UP</a>
                        </div>
                        <div class="my-2 d-flex justify-content-between align-items-center">
                          <div class="form-check">
                            <label class=" text-muted">
                                <a href="#" class="auth-link text-black"><i class="mdi mdi-account-circle"></i> User Manual</a>
                            </label>
                          </div>
                          <a href="#" class="auth-link text-black">Forgot password?</a>
                          
                          <a href="../../pages/samples/login.html" class="btn btn-sm btn-primary">Admin Log in</a>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
          </div>
          <div class="col-lg-6 ">
            <div class="card m-2">
              <div class="card-body">
                  <section class="home-newsletter">
                      <div class="container">
                          <div class="row" style=" padding: 10px 0px; border-radius: 10px; border: 1px solid #aaa; margin-bottom: 5px;">
                              <div class="col-sm-6">
                                  
                              </div>
                              <div class="col-sm-6 text-right">
                                  <a href="#" style="padding: 0px 10px;">About</a> <a href="#" style="padding: 0px 10px;">Blog</a> <a href="#" style="padding: 0px 10px;">Forum</a> <a href="#" style="padding: 0px 10px;">Contact</a>
                              </div>
                            </div>
                          <div class="row" style="background-color: #eee; padding: 10px 0px; border-radius: 10px; border: 1px solid #aaa;">
                              <div class="col-sm-6">
                                  <h4>Call to <br><b style="font-size: 60px; color: #243c4f;">333</b></h4>
                                  <p>For any Inquiries Regarding <b>BSCIC</b></p>
                              </div>
                              <div class="col-sm-6 text-right">
                                  <img src="../../images/333-logo.png" style="width: 50%;">
                              </div>
                            </div>

                            
                            <div class="row">
                              <div class="col-md-12 my-2">
                                <img src="../../images/push-pull-sms.png">
                              </div>
                            </div>

                      <div class="row my-3" style="background-color: #ccc; padding: 10px 0px; border-radius: 10px; border: 1px solid #aaa;">
                      <div class="col-sm-12">
                        <div class="single">
                          <h2>Subscribe to our Newsletter</h2>
                        <div class="input-group">
                               <input type="email" class="form-control" placeholder="Enter your email">
                               <span class="input-group-btn">
                               <button class="btn btn-theme" type="submit">Subscribe</button>
                               </span>
                        </div>
                        </div>
                      </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              
                          </div>
                        </div>
                      </div>
                      </section>
              </div>
            </div>
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018  All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
  <script>
    !function(t){function a(a,r){t('.raterater-input[data-id="'+a+'"]').data("input").val(r).change()}function r(){g.each(function(){var a=t(this);if(p.mode==u&&("INPUT"==a.prop("tagName")||"SELECT"==a.prop("tagName"))){var r="input-"+y++,e=t('<div class="raterater-input"></div>').attr("data-id",r).attr("data-rating",a.val()).data("input",a);a.attr("data-id",r).attr("data-id",r).attr("data-rating",a.val()).data("input",a).after(e).hide(),l=a=e}l=a;var s=c(a);if(!s)throw"Error: Each raterater element needs a unique data-id attribute.";f[s]={state:"inactive",stars:null},"static"===a.css("position")&&a.css("position","relative"),a.addClass("raterater-wrapper"),a.html(""),t.each(["bg","hover","rating","outline","cover"],function(){a.append(' <div class="raterater-layer raterater-'+this+'-layer"></div>')});for(var n=0;n<p.numStars;n++)a.children(".raterater-bg-layer").first().append('<i class="fa fa-star"></i>'),a.children(".raterater-outline-layer").first().append('<i class="fa fa-star-o"></i>'),a.children(".raterater-hover-layer").first().append('<i class="fa fa-star"></i>'),a.children(".raterater-rating-layer").first().append('<i class="fa fa-star"></i>');p.isStatic||(a.find(".raterater-cover-layer").hover(o,h),a.find(".raterater-cover-layer").mousemove(d),a.find(".raterater-cover-layer").click(i))})}function e(){g.each(function(){var a;a=p.mode==u?t(this).parent().find('.raterater-input[data-id="'+c(this)+'"]'):t(this);var r=(c(a),p.width+"px"),e=Math.floor(p.starWidth/p.starAspect)+"px";a.css("width",r).css("height",e),a.find(".raterater-layer").each(function(){t(this).css("width",r).css("height",e)});for(var i=0;i<p.numStars;i++)t.each(["bg","hover","rating","outline"],function(){a.children(".raterater-"+this+"-layer").first().children("i").eq(i).css("left",i*(p.starWidth+p.spaceWidth)+"px").css("font-size",Math.floor(p.starWidth/p.starAspect)+"px")});var s=parseFloat(a.attr("data-rating")),d=Math.floor(s),o=s-d;n(a.find(".raterater-rating-layer").first(),d,o)})}function i(r){var e=t(r.target).parent(),i=c(e),s=f[i].whole_stars_hover+f[i].partial_star_hover;s=Math.round(100*s)/100,f[i].state="rated",f[i].stars=s,e.find(".raterater-hover-layer").addClass("rated"),"input"!=p.mode&&void 0!==window[p.submitFunction]&&"function"==typeof window[p.submitFunction]?window[p.submitFunction](i,s):a(i,s)}function s(t,a){var r=Math.floor(t/(p.starWidth+p.spaceWidth)),e=t-r*(p.starWidth+p.spaceWidth);if(e>p.starWidth&&(e=p.starWidth),e/=p.starWidth,p.step!==!1){var i=1/p.step;e=Math.round(e*i)/i}f[a].whole_stars_hover=r,f[a].partial_star_hover=e}function n(t,a,r){for(var e=(c(t.parent()),0);a>e;e++)t.find("i").eq(e).css("width",p.starWidth+"px");t.find("i").eq(a).css("width",p.starWidth*r+"px");for(var e=a+1;e<p.numStars;e++)t.find("i").eq(e).css("width","0px")}function d(a){var r=c(t(a.target).parent());if("hover"===f[r].state){var e=a.offsetX;void 0===e&&(e=a.pageX-t(a.target).offset().left),f[r].stars=s(e,r);var i=t(a.target).parent().children(".raterater-hover-layer").first();n(i,f[r].whole_stars_hover,f[r].partial_star_hover)}}function o(a){var r=c(t(a.target).parent());("rated"!==f[r].state||p.allowChange)&&(f[r].state="hover",t(a.target).parent().children(".raterater-rating-layer").first().css("display","none"),t(a.target).parent().children(".raterater-hover-layer").first().css("display","block"))}function h(a){var r=t(a.target).parent(),e=c(r);if(t(a.target).parent().children(".raterater-hover-layer").first().css("display","none"),t(a.target).parent().children(".raterater-rating-layer").first().css("display","block"),"rated"===f[e].state){var i=parseFloat(f[e].stars),s=Math.floor(i),d=i-s;return void n(r.find(".raterater-rating-layer").first(),s,d)}f[e].state="inactive"}function c(a){return t(a).attr("data-id")}var l,f={},p={},u="input",v="callback",g=null,y=0;t.fn.raterater=function(a){if(t.fn.raterater.defaults={submitFunction:"",allowChange:!1,starWidth:20,spaceWidth:5,numStars:5,isStatic:!1,mode:v,step:!1},p=t.extend({},t.fn.raterater.defaults,a),p.width=p.numStars*(p.starWidth+p.spaceWidth),p.starAspect=.9226,p.step!==!1&&(p.step=parseFloat(p.step),p.step<=0||p.step>1))throw"Error: step must be between 0 and 1";return g=this,r(),e(),this}}(jQuery);

$(document).ready(function() {
    $('.ratebox').raterater({ 
    	submitFunction: 'rateAlert',
    	allowChange: false,
    	starWidth: 15,
    	spaceWidth: 2,
    	numStars: 5
    });
    
});

  </script>
</body>

</html>

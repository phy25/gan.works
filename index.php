<?php
function get_domain(){
    static $domain = null;
    if(empty($domain)){
        $domain = file_get_contents("domain.txt");
    }
    return $domain;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GAN - an EC503 Project</title>

  <!-- Bootstrap core CSS -->
  <link href="bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="clean-blog.min.css" rel="stylesheet">

</head>

<body data-domain="<?php echo get_domain(); ?>">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.html">GAN Works</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Navigation
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#intro">Intro</a>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link" href="#dragan">DRAGAN</a>
          </li>-->
          <li class="nav-item">
            <a class="nav-link" href="#acgan">ACGAN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#cyclegan">CycleGAN</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header id="intro" class="masthead" style="background-image: url('colordot.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Machine's Got Creativity</h1>
            <span class="subheading">Generating Image with Generative Adversarial Network</span>
            <p><a href="https://docs.google.com/presentation/d/1xqiZhlTF229UHXKYN9RhatMLsihSezqmobv-h_bo9SM/edit?usp=sharing" class="btn btn-primary">Intro Slides</a></p>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div id="alert-offline" class="alert alert-warning d-none">Local server offline. We are unable to provide the following generation services.<br>Due to the cost of CUDA-enabled server, we have to deploy it locally on our own computer. If you need to see the demo, please contact us at <a href="mailto:phy25@bu.edu">phy25@bu.edu</a>.</div>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <!--
  <article id="dragan">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <h2 class="post-title">DRAGAN Live Demo</h2>
          <form id="dragan-form" method="POST" action="<?php echo get_domain(); ?>/dragan" enctype="application/x-www-form-urlencoded" target="dragan-iframe">
            <button type="submit">Generate</button>
          </form>
          <iframe src="about:blank" name="dragan-iframe" id="dragan-iframe" style="width: 100%;height: 10em;border: none;"></iframe>
          <div id="dragan-image-div" class="d-none">
          </div>
        </div>
      </div>
    </div>
  </article>
  -->

  <article id="acgan">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <h2 class="post-title">ACGAN Live Demo</h2>
          <form id="acgan-form" method="POST" action="<?php echo get_domain(); ?>/acgan" enctype="application/x-www-form-urlencoded" target="acgan-iframe">
            Color vector:
            <input type="radio" name="color" id="acgan-color-0" value="0" checked>
            <label for="acgan-color-0">0 (red)</label>
            <input type="radio" name="color" id="acgan-color-1" value="1">
            <label for="acgan-color-1">1 (green)</label>
            <input type="radio" name="color" id="acgan-color-2" value="2">
            <label for="acgan-color-2">2 (sliver)</label>
            <input type="radio" name="color" id="acgan-color-3" value="3">
            <label for="acgan-color-3">3 (blue)</label>
            <button type="submit">Generate</button>
          </form>
          <iframe src="about:blank" name="acgan-iframe" id="acgan-iframe" style="width: 100%;height: 10em;border: none;"></iframe>
          <div id="acgan-image-div" class="d-none">
          </div>
        </div>
      </div>
    </div>
  </article>

  <article id="cyclegan" style="margin-top: 4em;">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <h2 class="post-title">CycleGAN Live Demo: change face style between genders</h2>
          <p>Upload an image, choose varient, and show the magic.</p>
          <form id="cyclegan-form" method="POST" action="<?php echo get_domain(); ?>/cyclegan" enctype="multipart/form-data" target="cyclegan-iframe">
            <input type="radio" name="varient" id="cyclegan-varient-man2woman" value="man2woman" checked>
            <label for="cyclegan-varient-man2woman">man2woman</label>
            <input type="radio" name="varient" id="cyclegan-varient-woman2man" value="woman2man">
            <label for="cyclegan-varient-woman2man">woman2man</label>
            <br>
            <small><label for="cyclegan-form-resize">Resize Image <i>(advanced)</i></label> <input type="range" id="cyclegan-form-resize" name="resize" min="0" max="1" step="0.1" value="1"></small>
            <br>
            <input id="cyclegan-form-image" type="file" accept="image/*" name="image" required>
            <button type="submit">Transform</button>
          </form>
          <iframe src="about:blank" name="cyclegan-iframe" id="cyclegan-iframe" style="width: 100%;height: 10em;border: none;"></iframe>
          <div id="cyclegan-image-div" class="d-none"></div>
          <p class="text-muted"><small>Due to the algorithm, face size (not the photo) around 80x80 will work best. If you insist, "Resize Image" may help you.</small></p>
        </div>
      </div>
    </div>
  </article>

  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p class="copyright text-muted">EC503 Group "Generating Images using Generative Adversarial Networks", 2019 Spring, Boston University.<br>Designed by Phy25. <a href="https://startbootstrap.com/themes/clean-blog">Template from Start Bootstrap</a>. Cover image credit: <a href="https://unsplash.com/@jemmail?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Phil B"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:black" viewBox="0 0 32 32"><title>Download free do whatever you want high-resolution photos from Phil B</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Phil B</span></a></p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="jquery.min.js"></script>
  <script src="bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="clean-blog.min.js"></script>
  <script>
(function(){
    var oReq = new XMLHttpRequest();
    oReq.addEventListener("load", function(){
        if(this.status == 200 && this.responseText == 'pong'){
        }else{
            document.getElementById('alert-offline').classList.remove('d-none');
        }
    });
    oReq.addEventListener("error", function(){
            document.getElementById('alert-offline').classList.remove('d-none');
    });
    oReq.open("GET", "<?php echo get_domain(); ?>/ping", true);
    oReq.setRequestHeader('Accept', 'plain/text');
    oReq.send();
})();

function supportFileAPI() {
    var fi = document.createElement('INPUT');
    fi.type = 'file';
    return 'files' in fi;
};

if(!!window.FormData && supportFileAPI()){
    document.getElementById('cyclegan-iframe').classList.add('d-none');
    document.getElementById('acgan-iframe').classList.add('d-none');
    // document.getElementById('dragan-iframe').classList.add('d-none');

    function init_image_result(form, result_img_div, get_values){
        result_img_div.classList.remove('d-none');

        form.addEventListener('submit', function(event){
            event.preventDefault();
            var submitBtn = this.querySelector("button[type='submit']");
            if(submitBtn) submitBtn.disabled = true;
            var oReq = new XMLHttpRequest();
            oReq.responseType = "blob";
            oReq.addEventListener("load", function(){
              if(submitBtn) submitBtn.disabled = false;
              var reader = new FileReader();
              if(this.status == 200 && this.response){
                  reader.onloadend = function() {
                      var base64data = reader.result;
                      var i = document.createElement('img');
                      i.style.cursor = "crosshair";
                      i.src = base64data;
                      i.addEventListener('click', function(){this.parentNode.removeChild(this);});
                      result_img_div.appendChild(i);
                  }
                  reader.readAsDataURL(this.response);
              }else if(this.response){
                  reader.onloadend = function() {
                      alert("Error ("+oReq.status+"): "+reader.result.substring(0, 100));
                  }
                  reader.readAsText(this.response);
              }else{
                  alert("Error ("+this.status+")");
              }
            });
            oReq.addEventListener("error", function(e){
              if(submitBtn) submitBtn.disabled = false;
              // console.log(e, this);
              alert("Error ("+this.status+"): ");
            });
            oReq.open("POST", this.action, true);
            if(this.enctype && this.enctype != "multipart/form-data") oReq.setRequestHeader('Content-Type', this.enctype);
            oReq.setRequestHeader('Accept', 'image/*');
            oReq.send(get_values(form));
            return false;
        });
    }

    init_image_result(document.getElementById('acgan-form'), document.getElementById('acgan-image-div'), function(f){
        // var formData = new FormData(f);
        var colors = document.getElementsByName("color");
        var color = '';

        for(var i = 0; i < colors.length; i++) {
            if(f.contains(colors[i]) && colors[i].checked){
                color = colors[i].value;
                break;
            }
        }
        return "color="+encodeURIComponent(color);
        // formData.append("color", color);
        // return formData;
    });

    // init_image_result(document.getElementById('dragan-form'), document.getElementById('dragan-image-div'), function(f){
    //     return "";
    // });

    init_image_result(document.getElementById('cyclegan-form'), document.getElementById('cyclegan-image-div'), function(f){
        var formData = new FormData(f);
        return formData;
    });
}
  </script>
</body>
</html>
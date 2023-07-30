
<?php
include_once __DIR__.'/layouts/header.php';
?>
<!--firmware download-->
<section class="container bg-white g-0 pt-5">
  <div class="card-title text-white p-3 p-head-bg">
    <h2 class="p-head">Huawei Mate 30 Firmware Download</h2>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-3 align-item-center pt-5 d-flex flex-column justify-content-between">
        <img src="assets/images/huawei/mate30-black.png" class="img-fluid align-self-center" style="width: 200px; height: 270px" alt="">

      </div>
      <div class="col-lg-9 py-5 px-5 mycontent">
        <p>Huawei ဖုန္းေတြ Logo ရပ္ေနျပီး Firmware တင္မရျဖစ္ေနတာေတြ ၊
          Downgrade ဆင္းခ်င္တာေတြ ၊ Boot Verify Fail ျဖစ္ေနတာေတြအတြက္
          ဒီနည္းနဲ႕ေျဖရွင္းနုိင္ပါတယ္၊ ပထမဆုံးလုိအပ္တာေတြကေတာ့ မိမိဖုန္းနဲ႕သက္ဆုိင္တဲ့
          Board Firmware ေတြကုိ Download ရယူထားဖို႔ပါပဲ၊ ေအာက္မွာေဒါင္းလိုက္ပါ။
        </p>
        <p>ျပီးသြားရင္ေတာ့ Board Software တင္ဖုိ႕အတြက္ Tool ကုိ Download ရယူပါ။
          Huawei Smart Phone Multi Download
          ျပီးရင္ဖုန္းကုိ Qualcomm Qloader 9008 Mode ကုိ၀င္ရပါမယ္.
          adb သိတဲ့လူေတြကေတာ့ adb reboot edl နဲ႕၀င္ပါ။
          adb မသိတဲ့သူေတြကေတာ့ Qualcomm Jig နဲ႕၀င္လုိ႕ရပါတယ္။
          Computer ထဲမွာ Qualcomm Driver သြင္းဖုိ႕မေမ့ပါနဲ႕
          Huawei Official Board Software ရဲ႕ ပုံေလးကေတာ့ ေအာက္မွာျမင္ရတဲ့ပုံေလးပါ။
          ျပီးရင္ Huawei Smart Phone Multi Download ကုိ ဖြင့္လုိက္ပါ။
          Manufacture ကုိေရြးေပးပါ။
          ျပီးရင္ Next ကုိ နွိပ္လုိက္ပါ။
          Password ကုိ 12345 ဆုိျပီးေပးလုိက္ပါ။
          မိမိ Flash လုိတဲ့ Board Firmware ထဲက xml ကုိေရြးေပးလုိက္ပါ။
          ျပီးရင္ Next ကုိ သြားပါ။
          Scan & Download ကုိနွိပ္ပါ။ ျပီးရင္ ဖုန္းကုိ edl mode ၀င္လုိက္ပါ။
          Device Manager မွာၾကည့္လုိက္ရင Qualcomm Qloader 9008 ဆုိျပီး
          port တစ္ခုတက္လာတာေတြ႕ရပါလိမ့္မယ္။
          40% ေရာက္သြားတာနဲ႕ ဖုန္းဟာ Reboot က်ျပီး
          သုံးေရာင္ျခယ္ Color နဲ႕တက္လာပါလိမ့္မယ္
          ျပီးရင္ Download Complete ျဖစ္ျပီဆုိရင္ေတာ့ ဖုန္းကုိ Battery ျဖဳတ္လုိက္ပါ။
          Official Firmware ျပန္တင္လုိက္ပါ။ ဒါဆုိအဆင္ေျပပါျပီ။</p>
      </div>
    </div>
    <div class="row align-items-center h-100 fw-information my-2 p-3">
      <hr>
      <div class="col-lg-6 ml-auto mr-auto ps-5">
        <div class="row d-flex">
          <!-- <div class="col-4 mt-2 fw-information-title"><b>ID</b></div>
          <div class="col-8 mt-2">1081</div> -->

          <div class="col-4 mt-2 fw-information-titl"><b>Name</b></div>
          <div class="col-8 mt-2">Huawei Mate 30</div>

          <div class="col-4 mt-2 fw-information-title"><b>MIUI Version</b></div>
          <div class="col-8 mt-2">12</div>

          <div class="col-4 mt-2 fw-information-title"><b>Android Version</b></div>
          <div class="col-8 mt-2">13</div>

          <div class="col-4 mt-2 fw-information-title"><b>Size</b></div>
          <div class="col-8 mt-2">3.46GB</div>

          <div class="col-4 mt-2 fw-information-title"><b>Type</b></div>
          <div class="col-8 mt-2">
            <span class="badge bg-dark rounded-1">img</span>
            <span class="badge bg-dark rounded-1">zip</span>
          </div>

          <div class="col-4 mt-2 fw-information-title"><b>Date</b></div>
          <div class="col-8 mt-2">21-05-2023</div>
        </div>
      </div>
      <div class="col-lg-10 text-center col-lg-10 offset-lg-1 col-xl-6 offset-xl-3">
        <div class="pt-5 pb-3">
          <a href="https://matix.li/3f2306e6f515" type="submit" class="btn rounded-1 w-50 border-0"
             id="down_btn">Download OneDrive&nbsp;<i class="ri-download-2-fill"></i></a>
        </div>
        <div class="pb-3">
          <a href="" type="submit" class="btn rounded-1 w-50 border-0" id="down_btn">Download
            MediaFire&nbsp;<i class="ri-download-2-fill"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include_once __DIR__.'/layouts/footer.php';
?>
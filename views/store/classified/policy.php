<section aff-section="classified_policy_page"></section>
<script aff-template="classified_policy_page" type="text/html">
   <section class="about-wrap-layout1">
      <div class="container">
         <div class="col-lg-10 col-sm-12 mx-auto">
            <div class="row">
               <div class="col-lg-6">
                  <div class="about-box-layout1">
                     <h2 class="item-title"><?= __('store.privacy_policy') ?></h2>
                     {{{policy_content}}}
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="about-box-layout2">
                     <div class="item-img">
                        <img src="{{policy_image}}" alt="About Us">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</script>
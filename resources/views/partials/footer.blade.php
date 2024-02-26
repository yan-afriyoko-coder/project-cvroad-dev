
    <footer class="site-footer">
      <div class="container">
        

        <div class="row">
          <div class="col-md-6">
            <h3 class="footer-heading mb-2 text-white">About</h3>
            <p>We Specialize in Motor Industry Candidates.</p>
            
          </div>
          
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">
                <h3 class="footer-heading mb-4 text-white">Quick Menu</h3>
                  <ul class="list-unstyled">
                    <li><a href="/privacy">Privacy</a></li>
                    <li><a href="/general-terms-conditions">Terms and Conditions</a></li>
                    <li><a href="/disclaimer">Disclaimer</a></li>
                    
                  </ul>
              </div>
           
            </div>
          </div>
          
        
       
      </div>
    </footer>
  </div>

  <script src="{{asset('external2/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('external2/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('external2/js/jquery-ui.js')}}"></script>
  <script src="{{asset('external2/js/popper.min.js')}}"></script>
  <script src="{{asset('external2/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('external2/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('external2/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('external2/js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('external2/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('external2/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('external2/js/aos.js')}}"></script>

  
 

  <script src="{{asset('external2/js/main.js')}}"></script>
    

  <script>
      document.addEventListener('DOMContentLoaded', function() {
                var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

                for (var i = 0; i < total; i++) {
                    new MediaElementPlayer(mediaElements[i], {
                        pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
                        shimScriptAccess: 'always',
                        success: function () {
                            var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
                            for (var j = 0; j < targetTotal; j++) {
                                target[j].style.visibility = 'visible';
                            }
                  }
                });
                }
            });
    </script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

    <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>


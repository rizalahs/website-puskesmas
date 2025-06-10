<!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      @php
        $footer = \App\Models\Footer::where('lang_id','2')->first();
      @endphp
      <div class="copyright text-center my-auto">
        <span>{{ $footer->footer_copyright }}</span>
      </div>
    </div>
  </footer>
<!-- End of Footer -->
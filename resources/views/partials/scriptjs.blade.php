<!--   Core   -->
  <script src="{{ asset('assets/js/jquery-3.4.1.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  <!--   Optional JS   -->
  <script src="{{ asset('assets/js/plugins/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/chart.js/dist/Chart.extension.js') }}"></script>
  <!--   Argon JS   -->
  <script src="{{ asset('assets/js/argon-dashboard.min.js?v=1.1.2') }}"></script>
  <!-- Data Tables JS -->
  <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
  <!-- Swal -->
  <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>

  @stack('scripts')
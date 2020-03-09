// 2 second to end

var timeleft = 2;
var downloadTimer = setInterval(function() {
  timeleft--;
  document.getElementById("ountdowntimer").textContent = timeleft;
  if (timeleft <= 0) clearInterval(downloadTimer);
}, 1000);

// Use link rel: <script src="myscripts.js"></script>
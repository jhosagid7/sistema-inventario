<script>
	document.addEventListener('DOMContentLoaded', function() {

		window.livewire.on('scan-ok', Msg => {
			noty(Msg)
		})

		window.livewire.on('scan-notfound', Msg => {
			noty(Msg, 2)
			doAction()
		})

		window.livewire.on('no-stock', Msg => {
			noty(Msg, 2)
		})

		window.livewire.on('output-ok', Msg => {
			console.log('output-ok')
            //@this.printTicket(Msg)
            noty(Msg)
	    })

		window.livewire.on('output-error', Msg => {
			noty(Msg, 2)
		})

	})
</script>
<script>

function getBrowser(agent) {
	var agent = window.navigator.userAgent.toLowerCase()
	switch (true) {
		case agent.indexOf("chrome") > -1 && !!window.chrome: return "chrome";
		case agent.indexOf("firefox") > -1: return "firefox";
		case agent.indexOf("safari") > -1: return "safari";
		case agent.indexOf("edge") > -1: return "edge";
		case agent.indexOf("edg") > -1: return "chromium based edge (dev or canary)";
		case agent.indexOf("opr") > -1 && !!window.opr: return "opera";
		case agent.indexOf("trident") > -1: return "ie";
		default: return "other";
	}
}
</script>

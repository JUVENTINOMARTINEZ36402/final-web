<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold">Comprar Boletos</h1>
        <p class="mt-4">Evento: {{ $event->title }}</p>
        <p class="mt-4">Precio: ${{ $event->price }}</p>
        <div id="paypal-button-container"></div>
        <p id="result-message" class="mt-4 text-green-500"></p>
    </div>

    <!-- PayPal SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=AT4RJof0QiD-EfD8Wkfy35Mz3x7b7JmPFDZQO482p3m8sQa_oKqPIrZsVqSWF07A24RKN3obI035ejoH&currency=USD"></script>

    <script>
        paypal.Buttons({
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{ $event->price }}'
                        }
                    }]
                });
            },
            onApprove: function (data, actions) {
                return actions.order.capture().then(function (details) {
                    fetch("{{ route('tickets.store') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            transaction_id: details.id,
                            amount: details.purchase_units[0].amount.value,
                            event_id: "{{ $event->id }}"
                        })
                    }).then(response => response.json())
                        .then(data => {
                            document.getElementById('result-message').innerText = "Pago exitoso. Tu boleto ha sido registrado.";
                        });
                });
            },
            onError: function (err) {
                console.error(err);
            }
        }).render('#paypal-button-container');
    </script>
</x-app-layout>

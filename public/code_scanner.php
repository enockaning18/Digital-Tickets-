<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>QR Code Scanner</title>
    <script src="https://unpkg.com/html5-qrcode"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5 text-center">
        <h3>Scan your ticket QR code</h3>
        <div id="reader" style="width: 300px; margin: auto;"></div>
        <div id="result" class="mt-3 text-muted">Waiting for scan...</div>
    </div>

    <script>
        function verifyReference(ref) {
            fetch(`verify_reference.php?ref=${ref}`)
                .then(res => {
                    if (!res.ok) throw new Error('Network error');
                    return res.text();
                })
                .then(text => {
                    console.log("Raw response:", text);
                    const data = JSON.parse(text);

                    if (data.found && data.status === 'new') {
                        Swal.fire('✅ Success', `Reference verified: ${data.ref}`, 'success');
                    } else if (data.found && data.status === 'used') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Already Used',
                            html: `<strong>Reference:</strong> ${data.ref}<br><strong>Used at:</strong> ${data.scanned_at}`,
                        });
                    } else {
                        Swal.fire('Not Found', 'Reference does not exist.', 'warning');
                    }
                })

                .catch(err => {
                    console.error("Verification failed:", err);
                    document.getElementById('result').innerHTML = "❌ Verification failed";
                    Swal.fire('Error', 'Something went wrong.', 'error');
                });
        }

        function onScanSuccess(decodedText, decodedResult) {
            console.log("Scanned:", decodedText);
            if (!decodedText) return;

            document.getElementById('result').innerHTML = "⏳ Verifying reference...";
            html5QrcodeScanner.clear(); // Stop scanning after first success to prevent multiple scans
            verifyReference(decodedText);
        }

        const html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: 250
            }
        );

        html5QrcodeScanner.render(onScanSuccess);
    </script>

</body>

</html>
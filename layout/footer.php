<script>
    $('#btn_logout').click(function() {
        if (confirm('Apakah anda ingin logout?')) {
            $.ajax({
                url: `<?= base_url ?>controller/LoginController.php`,
                method: 'POST',
                data: {
                    rute: 'logout'
                },
                success: function(res) {
                    window.location = `<?= base_url ?>views/auth/login.php`
                },
                error: function(err) {
                    console.error(err)
                }
            })
        } else {
            // Nothing
        }
    })
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
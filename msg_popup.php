<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!empty($_SESSION['msg_popup'])) {

?>


    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const toastEl = document.getElementById("msgToast");
            const toastBody = document.getElementById("msg-toast-body");

            if (toastEl && toastBody) {
                toastBody.textContent = "<?= addslashes($_SESSION['msg_popup']) ?>";
                const toast = new bootstrap.Toast(toastEl);
                toast.show();
            }
        });
    </script>


<?php
    $_SESSION["msg_popup"] = "";
}
?>


<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="msgToast" class="toast text-white bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-info text-white">
            <strong class="me-auto">Aviso</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="msg-toast-body"></div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
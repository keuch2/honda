/**
 * JavaScript para Subsitio VICAR Usados
 * Manejo de modal y formulario de contacto
 */

(function() {
    'use strict';

    // Abrir modal con datos del vehículo
    document.addEventListener('DOMContentLoaded', function() {
        
        // Event listener para botones "Me interesa"
        const botonesModal = document.querySelectorAll('.call-modal-usados');
        
        botonesModal.forEach(function(boton) {
            boton.addEventListener('click', function(e) {
                e.preventDefault();
                
                const usadoId = this.getAttribute('data-id');
                const usadoNombre = this.getAttribute('data-nombre');
                
                // Actualizar modal
                document.getElementById('usado_id').value = usadoId;
                document.getElementById('modal-usado-nombre').textContent = usadoNombre;
            });
        });

        // Enviar formulario de contacto
        const btnEnviar = document.getElementById('btn-enviar-contacto-usado');
        
        if (btnEnviar) {
            btnEnviar.addEventListener('click', function(e) {
                e.preventDefault();
                enviarFormularioUsado();
            });
        }
    });

    /**
     * Enviar formulario de contacto de usado
     */
    function enviarFormularioUsado() {
        const form = document.getElementById('form-contacto-usado');
        
        // Validar formulario
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        const formData = new FormData(form);
        
        // Deshabilitar botón mientras envía
        const btnEnviar = document.getElementById('btn-enviar-contacto-usado');
        btnEnviar.disabled = true;
        btnEnviar.textContent = 'Enviando...';

        // Enviar con fetch
        fetch('procesar-contacto-usado.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('¡Mensaje enviado correctamente! Nos pondremos en contacto contigo pronto.');
                
                // Cerrar modal
                const modal = document.getElementById('modalUsados');
                if (typeof bootstrap !== 'undefined') {
                    const modalInstance = bootstrap.Modal.getInstance(modal);
                    if (modalInstance) {
                        modalInstance.hide();
                    }
                } else if (typeof jQuery !== 'undefined') {
                    jQuery('#modalUsados').modal('hide');
                }
                
                // Limpiar formulario
                form.reset();
            } else {
                alert('Error al enviar el mensaje: ' + (data.message || 'Error desconocido'));
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al enviar el mensaje. Por favor, inténtalo de nuevo.');
        })
        .finally(() => {
            // Rehabilitar botón
            btnEnviar.disabled = false;
            btnEnviar.textContent = 'Enviar';
        });
    }

})();

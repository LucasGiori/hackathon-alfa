class Dialog {

    static show(options) {
        
      const id = `modal-${(new Date().valueOf())}`
        
        const modal = `
                <div class="modal" tabindex="-1">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">${options.title}</h5>
                    </div>
                    <div class="modal-body">
                    <p>${options.message}</p>
                    </div>
                    <div class="modal-footer">
                    
                    </div>
                </div>
                </div>
            </div>
        `

        $('options.scope').append(modal)
        const modalView = $('#' + id).modal()
        Dialog.renderButtons(modalView, options.buttons)
      }

      static renderButtons(modalView, buttons) {
          buttons.forEach((buttonOption) => {
            const button = modal.find('.modal-footer').append(
              '<button type="button" class="btn btn-primary">'+
              buttonOption.label +
            )
          })
      }

    }

    module.exports = Dialog;
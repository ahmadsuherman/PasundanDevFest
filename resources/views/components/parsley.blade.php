<script src="https://parsleyjs.org/dist/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(function () {
        const $form = $('form[data-form="validate"]'),
        $formGroup = $form.find('.form-group')

        $.extend(window.Parsley.options, {
            errorClass: 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500',
            successClass: 'bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block p-2.5 dark:bg-gray-700 dark:border-green-500',
            validationThreshold:0,
            classHandler: function(ParsleyField) {
                return ParsleyField.$element.parents('.form-control')
            },
            errorsContainer: function(ParsleyField) {
                const $formColumn = ParsleyField.$element.parents('.form-group').find('.col-sm-10')
                if ($formColumn.length) return $formColumn
                return ParsleyField.$element.parents('.form-group')
            },
            errorsWrapper: '<div class="text-red-600 text-sm"></div>',
            errorTemplate: '<div></div>'
        })

        window.Parsley.addValidator('unequalto', {
            requirementType: 'string',
            validateString: function(value, element) {
                return value !== $(element).val()
            },
            messages: {
                en: 'The values cannot be the same.'
            }
        })

        window.Parsley.addValidator('mindate', {
            requirementType: 'string',
            validateString: function(value, element) {
                return moment(value).isAfter($(element).val())
            },
            messages: {
                en: 'The values cannot be less or the same.'
            }
        })

        $form.parsley()

        $form.on('submit', function () {
            $(this).find('.btn[type="submit"]').attr('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>')
        })
    })
</script>
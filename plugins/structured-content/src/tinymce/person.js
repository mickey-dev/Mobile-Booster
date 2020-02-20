export default function ( editor ) {
    return {
        text   : 'Person',
        tooltip: 'Adds a Person block to the page.',
        onclick: () => {
            editor.windowManager.open( {
                title   : 'Featured Snippet Person',
                minWidth: 500,
                height: 500,
                autoScroll: true,
                classes: 'sc-panel',
                body    : [
                    {
                        type   : 'checkbox',
                        name   : 'giveHTML',
                        label  : 'Render HTML',
                        checked: true
                    },
                    {
                        type : 'container',
                        name : 'container',
                        label: '',
                        html : '<h1 style="font-weight: bold;">Personal</h1>'
                    },
                    {
                        label      : 'Name',
                        type       : 'textbox',
                        name       : 'personName',
                        value      : '',
                        placeholder: 'Please enter your Name here ...',
                        multiline  : true,
                    },
                    {
                        label      : 'Job Title',
                        type       : 'textbox',
                        name       : 'jobTitle',
                        value      : '',
                        placeholder: 'Please enter your job title here ...',
                        multiline  : true,
                    },

                    {
                        type   : 'textbox',
                        name   : 'sc_img',
                        label  : 'Image',
                        value  : '',
                        classes: 'image',
                    },
                    {
                        type   : 'button',
                        name   : 'select_image',
                        label  : ' ',
                        text   : 'Select Image',
                        classes: 'select_image',
                    },
                    {
                        type : 'container',
                        name : 'container',
                        label: '',
                        html : '<h1 style="font-weight: bold;">Contact</h1>'
                    },
                    {
                        type       : 'textbox',
                        name       : 'email',
                        label      : 'E-Mail',
                        value      : '',
                        placeholder: 'jane-doe@xyz.edu',
                        multiline  : false,
                    },
                    {
                        type       : 'textbox',
                        name       : 'homepage',
                        label      : 'URL',
                        value      : '',
                        placeholder: 'https://example.com',
                        multiline  : false,
                    },
                    {
                        type       : 'textbox',
                        name       : 'telephone',
                        label      : 'Telephone',
                        value      : '',
                        placeholder: '(425) 123-4567',
                        multiline  : false,
                    },
                    {
                        type : 'container',
                        name : 'container',
                        label: '',
                        html : '<h1 style="font-weight: bold;">Address</h1>'
                    },
                    {
                        type       : 'textbox',
                        name       : 'streetAddress',
                        label      : 'Street',
                        value      : '',
                        placeholder: 'Any Street 3A',
                    },
                    {
                        type       : 'textbox',
                        name       : 'postalCode',
                        label      : 'Postal Code',
                        value      : '',
                        placeholder: 'Any Postal Code',
                    },
                    {
                        type       : 'textbox',
                        name       : 'addressLocality',
                        label      : 'Locality',
                        value      : '',
                        placeholder: 'Any City',
                    },
                    {
                        type       : 'textbox',
                        name       : 'addressCountry',
                        label      : 'Country ISO Code',
                        value      : '',
                        placeholder: 'US',
                    },
                    {
                        type       : 'textbox',
                        name       : 'addressRegion',
                        label      : 'Region ISO Code',
                        value      : '',
                        placeholder: 'CA',
                    },
                    {
                        type : 'container',
                        name : 'container',
                        label: '',
                        html : '<h1 style="font-weight: bold;">Colleague</h1>'
                    },
                    {
                        type       : 'textbox',
                        name       : 'colleague',
                        label      : 'Colleague',
                        value      : '',
                        placeholder: 'Comma seperated URLs',
                    },
                    {
                        type : 'textbox',
                        name : 'sc_cssClass',
                        label: 'CSS classes',
                        value: '',
                        default : '',
                    },
                ],

                onsubmit: e => {
                    editor.insertContent(
                        `[sc_fs_person 
                            html="${e.data.giveHTML}"
                            person_name="${e.data.personName}" 
                            job_title="${e.data.jobTitle}" 
                            image_id="${e.data.sc_img}"
                            street_address="${e.data.streetAddress}"
                            address_locality="${e.data.addressLocality}"
                            address_region="${e.data.addressRegion}"
                            postal_code="${e.data.postalCode}"
                            address_country="${e.data.addressCountry}"
                            email="${e.data.email}"
                            url="${e.data.homepage}"
                            telephone="${e.data.telephone}"
                            css_class="${e.data.sc_cssClass}"
                            colleague="${e.data.colleague}"
                        ]`
                    );
                },
            } );
            bindImageButtons();
        },
    }
};

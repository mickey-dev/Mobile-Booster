export default function (editor) {
    return {
        text   : editor.getLang('wpsc.personButtonText', 'Person'),
        tooltip: editor.getLang('wpsc.personTooltip', 'Adds a Person block to the page.'),
        onclick: () => {
            editor.windowManager.open({
                title     : editor.getLang('wpsc.personPopupTitle', 'Featured Snippet Person'),
                minWidth  : 500,
                height    : 500,
                autoScroll: true,
                classes   : 'sc-panel',
                body      : [
                    {
                        type   : 'checkbox',
                        name   : 'giveHTML',
                        label  : editor.getLang('wpsc.renderHTML', 'Render HTML'),
                        checked: true
                    },
                    {
                        type : 'container',
                        name : 'container',
                        label: '',
                        html : `<h1 style="font-weight: bold;">${editor.getLang('wpsc.personal', 'Personal')}</h1>`
                    },
                    {
                        type       : 'textbox',
                        name       : 'personName',
                        label      : editor.getLang('wpsc.name', 'Name'),
                        value      : '',
                        placeholder: editor.getLang('wpsc.namePlaceholder', 'Please enter your Name here ...'),
                        multiline  : true,
                    },
                    {
                        type       : 'textbox',
                        name       : 'jobTitle',
                        label      : editor.getLang('wpsc.jobTitle', 'Job Title'),
                        value      : '',
                        placeholder: editor.getLang('wpsc.jobTitlePlaceholder', 'Please enter your job title here ...'),
                        multiline  : true,
                    },
                    {
                        type   : 'textbox',
                        name   : 'sc_img',
                        label  : editor.getLang('wpsc.image', 'Image'),
                        value  : '',
                        classes: 'image',
                    },
                    {
                        type   : 'button',
                        name   : 'select_image',
                        label  : ' ',
                        text   : editor.getLang('wpsc.addImage', 'Add Image'),
                        classes: 'select_image',
                    },
                    {
                        type : 'container',
                        name : 'container',
                        label: '',
                        html : `<h1 style="font-weight: bold;">${editor.getLang('wpsc.contact', 'Contact')}</h1>`
                    },
                    {
                        type       : 'textbox',
                        name       : 'email',
                        label      : editor.getLang('wpsc.email', 'E-Mail'),
                        value      : '',
                        placeholder: editor.getLang('wpsc.contactEmail', 'jane-doe@xyz.edu'),
                        multiline  : false,
                    },
                    {
                        type       : 'textbox',
                        name       : 'homepage',
                        label      : editor.getLang('wpsc.contactHomepage', 'URL'),
                        value      : '',
                        placeholder: editor.getLang('wpsc.contactHomepagePlaceholder', 'http://www.janedoe.com'),
                        multiline  : false,
                    },
                    {
                        type       : 'textbox',
                        name       : 'telephone',
                        label      : editor.getLang('wpsc.contactPhone', 'Telephone'),
                        value      : '',
                        placeholder: editor.getLang('wpsc.contactPhonePlaceholder', '(425) 123-4567'),
                        multiline  : false,
                    },
                    {
                        type : 'container',
                        name : 'container',
                        label: '',
                        html : `<h1 style="font-weight: bold;">${editor.getLang('wpsc.address', 'Address')}</h1>`
                    },
                    {
                        type       : 'textbox',
                        name       : 'streetAddress',
                        label      : editor.getLang('wpsc.street', 'Street'),
                        value      : '',
                        placeholder: editor.getLang('wpsc.streetPlaceholder', 'Any Street 3A'),
                    },
                    {
                        type       : 'textbox',
                        name       : 'postalCode',
                        label      : editor.getLang('wpsc.zip', 'Postal Code'),
                        value      : '',
                        placeholder: editor.getLang('wpsc.zipPlaceholder', 'Any Postal Code'),
                    },
                    {
                        type       : 'textbox',
                        name       : 'addressLocality',
                        label      : editor.getLang('wpsc.locality', 'Locality'),
                        value      : '',
                        placeholder: editor.getLang('wpsc.localityPlaceholder', 'Any City'),
                    },
                    {
                        type       : 'textbox',
                        name       : 'addressCountry',
                        label      : editor.getLang('wpsc.countryCode', 'Country ISO Code'),
                        value      : '',
                        placeholder: editor.getLang('wpsc.countryCode', 'US'),
                    },
                    {
                        type       : 'textbox',
                        name       : 'addressRegion',
                        label      : editor.getLang('wpsc.regionCode', 'Region ISO Code'),
                        value      : '',
                        placeholder: editor.getLang('wpsc.regionCodePlaceholder', 'CA')
                    },
                    {
                        type : 'container',
                        name : 'container',
                        label: '',
                        html : `<h1 style="font-weight: bold;">${editor.getLang('wpsc.colleague', 'Colleague')}</h1>`
                    },
                    {
                        type       : 'textbox',
                        name       : 'colleague',
                        label      : editor.getLang('wpsc.colleague', 'Colleague'),
                        value      : '',
                        placeholder: editor.getLang('wpsc.colleaguePlaceholder', 'Comma seperated URLs'),
                    },
                    {
                        type   : 'textbox',
                        name   : 'sc_cssClass',
                        label  : editor.getLang('wpsc.cssClass', 'CSS class'),
                        value  : '',
                        default: '',
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
            });
            bindImageButtons();
        },
    }
};

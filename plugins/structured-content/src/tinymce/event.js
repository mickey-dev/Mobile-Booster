export default function (editor) {
    let postfixDateLabel = '',
        minWidth         = 500;
    if (!datetimeLocalSupported()) {
        postfixDateLabel = '(Format: 2019-08-22T10:25)';
        minWidth = 800;
    }
    return {
        text   : 'Event',
        tooltip: 'Adds a Event block to the page.',
        onclick: () => {
            editor.windowManager.open({
                title     : 'Featured Snippet Event',
                minWidth  : minWidth,
                height    : 500,
                autoScroll: true,
                classes   : 'sc-panel',
                body      : [
                    {
                        type   : 'checkbox',
                        name   : 'giveHTML',
                        label  : 'Render HTML',
                        checked: true
                    },
                    {
                        type  : 'listbox',
                        name  : 'titleTag',
                        label : 'Headline-Tag',
                        values: [
                            {text: 'h2', value: 'h2'},
                            {text: 'h3', value: 'h3'},
                            {text: 'h4', value: 'h4'},
                            {text: 'h5', value: 'h5'},
                            {text: 'h6', value: 'h6'},
                            {text: 'p', value: 'p'},
                        ],
                        value : 'h2', // Sets the default
                    },
                    {
                        label      : 'Title',
                        type       : 'textbox',
                        name       : 'title',
                        value      : '',
                        placeholder: 'Enter Your Event Title...',
                        multiline  : true,
                    },
                    {
                        type       : 'textbox',
                        name       : 'description',
                        label      : 'Description',
                        value      : '',
                        placeholder: 'Enter your Event Description here...',
                        multiline  : true,
                        minHeight  : 100,
                    },
                    {
                        type   : 'textbox',
                        name   : 'image_id',
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
                    }, // new stuff!
                    {
                        type : 'container',
                        name : 'container',
                        label: '',
                        html : '<h1 style="font-weight: bold;">Company</h1>'
                    },
                    {
                        type       : 'textbox',
                        name       : 'eventLocation',
                        label      : 'Name',
                        value      : '',
                        placeholder: 'Event Location Name',
                        multiline  : true,
                    },
                    {
                        type   : 'textbox',
                        name   : 'startDate',
                        label  : `Start Date ${postfixDateLabel}`,
                        classes: 'sc_start_date',
                    },
                    {
                        type   : 'textbox',
                        name   : 'endDate',
                        label  : `End Date ${postfixDateLabel}`,
                        classes: 'sc_end_date',
                    },
                    {
                        type : 'container',
                        name : 'container',
                        label: '',
                        html : '<h1 style="font-weight: bold;">Event Location</h1>'
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
                        html : '<h1 style="font-weight: bold;">Performer</h1>'
                    },
                    {
                        type  : 'listbox',
                        name  : 'performer',
                        label : 'Performer Type',
                        values: [
                            {text: 'Performing Group', value: 'PerformingGroup'},
                            {text: 'Person', value: 'Person'}
                        ]
                    },
                    {
                        type       : 'textbox',
                        name       : 'performerName',
                        label      : 'Performer',
                        value      : '',
                        placeholder: 'John Doe',
                    },
                    {
                        type : 'container',
                        name : 'container',
                        label: '',
                        html : '<h1 style="font-weight: bold;">Offer</h1>'
                    },
                    {
                        type  : 'listbox',
                        name  : 'offerAvailability',
                        label : 'Availability',
                        values: [
                            {text: 'In Stock', value: 'InStock'},
                            {text: 'Sold Out', value: 'SoldOut'},
                            {text: 'Pre Order', value: 'PreOrder'}
                        ]
                    },
                    {
                        type       : 'textbox',
                        name       : 'offerUrl',
                        label      : 'Ticket Website',
                        value      : '',
                        placeholder: 'https://example.com',
                        multiline  : false,
                    },
                    {
                        type       : 'textbox',
                        name       : 'currencyCode',
                        label      : 'Currency ISO Code',
                        value      : '',
                        placeholder: 'USD',
                    },
                    {
                        type       : 'textbox',
                        name       : 'price',
                        label      : 'Price',
                        value      : '',
                        placeholder: '40.00',
                    },
                    {
                        type   : 'textbox',
                        name   : 'offerValidFrom',
                        label  : `Valid From ${postfixDateLabel}`,
                        classes: 'sc_valid_from',
                    },
                    {
                        type : 'container',
                        name : 'container',
                        label: '',
                        html : '<h1 style="font-weight: bold;">Additional</h1>'
                    },
                    {
                        type : 'textbox',
                        name : 'cssClass',
                        label: 'CSS classes',
                        value: '',
                    },
                ],
                onsubmit  : e => {
                    editor.insertContent(
                        `[sc_fs_event 
                            html="${e.data.giveHTML}" 
                            title="${e.data.title}" 
                            title_tag="${e.data.titleTag}"
                            event_location="${e.data.eventLocation}"
                            start_date="${e.data.startDate}"
                            end_date="${e.data.endDate}"
                            street_address="${e.data.streetAddress}"
                            address_locality="${e.data.addressLocality}"
                            address_region="${e.data.addressRegion}"
                            postal_code="${e.data.postalCode}"
                            address_country="${e.data.addressCountry}"
                            image_id="${e.data.image_id}"
                            performer="${e.data.performer}"
                            performer_name="${e.data.performerName}"
                            offer_availability="${e.data.offerAvailability}"
                            offer_url="${e.data.offerUrl}"
                            currency_code="${e.data.currencyCode}"
                            price="${e.data.price}"
                            offer_valid_from="${e.data.offerValidFrom}"
                            css_class="${e.data.cssClass}"
                ]
                ${e.data.description}
                [/sc_fs_event]`
                    );
                }
                ,
            });
            if (datetimeLocalSupported()) {
                document.querySelector('.mce-sc_start_date').type = 'datetime-local';
                document.querySelector('.mce-sc_end_date').type = 'datetime-local';
                document.querySelector('.mce-sc_valid_from').type = 'datetime-local';
            }
            bindImageButtons();
        },
    }
};

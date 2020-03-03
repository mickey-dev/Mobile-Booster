export default function (editor) {
    let postfixDateLabel = '',
        minWidth         = 500;
    if (!datetimeLocalSupported()) {
        postfixDateLabel = '(Format: 2019-08-22T10:25)';
        minWidth = 800;
    }
    return {
        text   : editor.getLang('wpsc.eventButtonText', 'Event'),
        tooltip: editor.getLang('wpsc.eventTooltip', 'Adds a Event block to the page.'),
        onclick: () => {
            editor.windowManager.open({
                title     : editor.getLang('wpsc.eventPopupTitle', 'Featured Snippet Event'),
                minWidth  : minWidth,
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
                        type  : 'listbox',
                        name  : 'titleTag',
                        label : editor.getLang('wpsc.titleTag', 'Title Tag'),
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
                        type       : 'textbox',
                        name       : 'title',
                        label      : editor.getLang('wpsc.event', 'Event Title'),
                        value      : '',
                        placeholder: editor.getLang('wpsc.eventPlaceholder', 'Enter Your Event Title...'),
                        multiline  : true,
                    },
                    {
                        type       : 'textbox',
                        name       : 'description',
                        label      : editor.getLang('wpsc.description', 'Description'),
                        value      : '',
                        placeholder: editor.getLang('wpsc.eventDescriptionPlaceholder', 'Enter your event description here...'),
                        multiline  : true,
                        minHeight  : 100,
                    },
                    {
                        type   : 'textbox',
                        name   : 'image_id',
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
                        html : `<h1 style="font-weight: bold;">${editor.getLang('wpsc.eventMeta', 'Event Meta')}</h1>`
                    },
                    {
                        type       : 'textbox',
                        name       : 'eventLocation',
                        label      : editor.getLang('wpsc.name', 'Name'),
                        value      : '',
                        placeholder: editor.getLang('wpsc.eventLocationNamePlaceholder', 'Event Location Name'),
                        multiline  : true,
                    },
                    {
                        type   : 'textbox',
                        name   : 'startDate',
                        label  : `${editor.getLang('editor.startDate', 'Start Date')} ${postfixDateLabel}`,
                        classes: 'sc_start_date',
                    },
                    {
                        type   : 'textbox',
                        name   : 'endDate',
                        label  : `${editor.getLang('editor.endDate', 'End Date')} ${postfixDateLabel}`,
                        classes: 'sc_end_date',
                    },
                    {
                        type : 'container',
                        name : 'container',
                        label: '',
                        html : `<h1 style="font-weight: bold;">${editor.getLang('wpsc.eventLocation', 'Event Location')}</h1>`
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
                        html : `<h1 style="font-weight: bold;">${editor.getLang('wpsc.performer', 'Performer')}</h1>`
                    },
                    {
                        type  : 'listbox',
                        name  : 'performer',
                        label : editor.getLang('wpsc.type', 'Type'),
                        values: [
                            {text: editor.getLang('wpsc.performingGroup', 'Performing Group'), value: 'PerformingGroup'},
                            {text: editor.getLang('wpsc.performingPerson', 'Person'), value: 'Person'}
                        ]
                    },
                    {
                        type       : 'textbox',
                        name       : 'performerName',
                        label      : editor.getLang('wpsc.performerName', 'Performer'),
                        value      : '',
                        placeholder: editor.getLang('wpsc.performerNamePlaceholder', 'John Doe'),
                    },
                    {
                        type : 'container',
                        name : 'container',
                        label: '',
                        html : `<h1 style="font-weight: bold;">${editor.getLang('wpsc.offer', 'Offer')}</h1>`
                    },
                    {
                        type  : 'listbox',
                        name  : 'offerAvailability',
                        label : editor.getLang('wpsc.availability', 'Availability'),
                        values: [
                            {text: editor.getLang('wpsc.inStock', 'In Stock'), value: 'InStock'},
                            {text: editor.getLang('wpsc.soldOut', 'Sold Out'), value: 'SoldOut'},
                            {text: editor.getLang('wpsc.preOrder', 'Pre Order'), value: 'PreOrder'}
                        ]
                    },
                    {
                        type       : 'textbox',
                        name       : 'offerUrl',
                        label      : editor.getLang('wpsc.ticketWebsite', 'Ticket Website'),
                        value      : '',
                        placeholder: editor.getLang('wpsc.ticketWebsitePlaceholder', 'https://your-website.com'),
                        multiline  : false,
                    },
                    {
                        type       : 'textbox',
                        name       : 'currencyCode',
                        label      : editor.getLang('wpsc.currencyCode', 'Currency ISO Code'),
                        value      : '',
                        placeholder: editor.getLang('wosc.currencyCodePlaceholder', 'USD'),
                    },
                    {
                        type       : 'textbox',
                        name       : 'price',
                        label      : editor.getLang('wpsc.price', 'Price'),
                        value      : '',
                        placeholder: '40.00',
                    },
                    {
                        type   : 'textbox',
                        name   : 'offerValidFrom',
                        label  : `${editor.getLang('wpsc.validFrom', 'Valid From')} ${postfixDateLabel}`,
                        classes: 'sc_valid_from',
                    },
                    {
                        type : 'container',
                        name : 'container',
                        label: '',
                        html : `<h1 style="font-weight: bold;">${editor.getLang('wpsc.additional', 'Additional')}</h1>`
                    },
                    {
                        type : 'textbox',
                        name : 'cssClass',
                        label: editor.getLang('wpsc.cssClass', 'CSS class'),
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

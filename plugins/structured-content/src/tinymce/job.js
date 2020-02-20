export default function (editor) {
    let postfixDateLabel = '',
        minWidth         = 500;
    if (!dateSupported()) {
        postfixDateLabel = '(Format: 2019-08-22)';
        minWidth = 800;
    }
    return {
        text   : 'Job',
        tooltip: 'Adds a JobPosting block to the page.',
        onclick: () => {
            editor.windowManager.open({
                title     : 'Featured Snippet Job',
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
                        name       : 'jobTitle',
                        value      : '',
                        placeholder: 'Please enter your job title here ...',
                        multiline  : true,
                    },
                    {
                        type       : 'textbox',
                        name       : 'description',
                        label      : 'Description',
                        value      : '',
                        placeholder: 'Enter your job description here...',
                        multiline  : true,
                        minHeight  : 100,
                    },
                    {
                        type : 'container',
                        name : 'container',
                        label: '',
                        html : '<h1 style="font-weight: bold;">Company</h1>'
                    },
                    {
                        type       : 'textbox',
                        name       : 'companyName',
                        label      : 'Name',
                        value      : '',
                        placeholder: 'Company Name',
                        multiline  : true,
                    },
                    {
                        type       : 'textbox',
                        name       : 'sameAs',
                        label      : 'Same as (Website / Social Media)',
                        value      : '',
                        placeholder: 'https://example.com',
                        multiline  : false,
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
                        html : '<h1 style="font-weight: bold;">Job Location</h1>'
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
                        html : '<h1 style="font-weight: bold;">Salary</h1>'
                    },
                    {
                        type  : 'listbox',
                        name  : 'baseSalary',
                        label : 'Unit',
                        values: [
                            {text: 'Hourly', value: 'HOUR'},
                            {text: 'Daily', value: 'DAY'},
                            {text: 'Weekly', value: 'WEEK'},
                            {text: 'Monthly', value: 'MONTH'},
                            {text: 'Yearly', value: 'YEAR'}
                        ],
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
                        name       : 'quantitativeValue',
                        label      : 'Value',
                        value      : '',
                        placeholder: '40.00',
                    },
                    {
                        type : 'container',
                        name : 'container',
                        label: '',
                        html : '<h1 style="font-weight: bold;">Job Meta</h1>'
                    },
                    {
                        type  : 'listbox',
                        name  : 'employmentType',
                        label : 'Employment Type',
                        values: [
                            {text: 'Full Time', value: 'FULL_TIME'},
                            {text: 'Part Time', value: 'PART_TIME'},
                            {text: 'Contractor', value: 'CONTRACTOR'},
                            {text: 'Temporary', value: 'TEMPORARY'},
                            {text: 'Intern', value: 'INTERN'},
                            {text: 'Volunteer', value: 'VOLUNTEER'},
                            {text: 'Per Diem', value: 'PER_DIEM'},
                            {text: 'Other', value: 'OTHER'}
                        ],
                    },
                    {
                        type   : 'textbox',
                        name   : 'validThrough',
                        label  : `Valid Through ${postfixDateLabel}`,
                        classes: 'sc_valid_through',
                    },
                    {
                        type : 'textbox',
                        name : 'sc_cssClass',
                        label: 'CSS classes',
                        value: '',
                    },
                ],
                onsubmit  : e => {
                    editor.insertContent(
                        `[sc_fs_job 
							html="${e.data.giveHTML}" 
							title="${e.data.jobTitle}" 
							title_tag="${e.data.titleTag}" 
							valid_through="${e.data.validThrough}" 
							employment_type="${e.data.employmentType}" 
							company_name="${e.data.companyName}" 
							same_as="${e.data.sameAs}" 
							logo_id="${e.data.sc_img}"
							street_address="${e.data.streetAddress}"
							address_locality="${e.data.addressLocality}"
							address_region="${e.data.addressRegion}"
							postal_code="${e.data.postalCode}"
							address_country="${e.data.addressCountry}"
							currency_code="${e.data.currencyCode}"
							quantitative_value="${e.data.quantitativeValue}"
							base_salary="${e.data.baseSalary}"
							css_class="${e.data.sc_cssClass}"
						]${e.data.description}[/sc_fs_job]`
                    );
                },
            });
            if (dateSupported()) {
                document.querySelector('.mce-sc_valid_through').type = 'date';
            }
            bindImageButtons();
        },
    }
};

export default function (editor) {
    let postfixDateLabel = '',
        minWidth         = 500;
    if (!dateSupported()) {
        postfixDateLabel = '(Format: 2019-08-22)';
        minWidth = 800;
    }
    return {
        text   : editor.getLang('wpsc.jobButtonText', 'Job'),
        tooltip: editor.getLang('wpsc.jobTooltip', 'Adds a JobPosting block to the page.'),
        onclick: () => {
            editor.windowManager.open({
                title     : editor.getLang('wpsc.jobPopupTitle', 'Featured Snippet Job'),
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
                        name       : 'jobTitle',
                        label      : editor.getLang('wpsc.job', 'Job title'),
                        value      : '',
                        placeholder: editor.getLang('wpsc.jobPlaceholder', 'Please enter your job title here ...'),
                        multiline  : true,
                    },
                    {
                        type       : 'textbox',
                        name       : 'description',
                        label      : editor.getLang('wpsc.description', 'Description'),
                        value      : '',
                        placeholder: editor.getLang('wpsc.jobDescriptionPlaceholder', 'Enter your job description here...'),
                        multiline  : true,
                        minHeight  : 100,
                    },
                    {
                        type : 'container',
                        name : 'container',
                        label: '',
                        html : `<h1 style="font-weight: bold;">${editor.getLang('wpsc.company', 'Company')}</h1>`
                    },
                    {
                        type       : 'textbox',
                        name       : 'companyName',
                        label      : editor.getLang('wpsc.name', 'Name'),
                        value      : '',
                        placeholder: editor.getLang('wpsc.companyNamePlaceholder', 'Company Name'),
                        multiline  : true,
                    },
                    {
                        type       : 'textbox',
                        name       : 'sameAs',
                        label      : editor.getLang('wpsc.sameAs', 'Same as (Website / Social Media)'),
                        value      : '',
                        placeholder: editor.getLang('wpsc.sameAsPlaceholder', 'https://your-website.com'),
                        multiline  : false,
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
                        html : `<h1 style="font-weight: bold;">${editor.getLang('wpsc.jobLocation', 'Job Location')}</h1>`
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
                        html : `<h1 style="font-weight: bold;">${editor.getLang('wpsc.salary', 'Salary')}</h1>`
                    },
                    {
                        type  : 'listbox',
                        name  : 'baseSalary',
                        label : editor.getLang('wpsc.unit', 'Unit'),
                        values: [
                            {text: editor.getLang('wpsc.hourly', 'Hourly'), value: 'HOUR'},
                            {text: editor.getLang('wpsc.daily', 'Daily'), value: 'DAY'},
                            {text: editor.getLang('wpsc.weekly', 'Weekly'), value: 'WEEK'},
                            {text: editor.getLang('wpsc.monthly', 'Monthly'), value: 'MONTH'},
                            {text: editor.getLang('wpsc.yearly', 'Yearly'), value: 'YEAR'}
                        ],
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
                        name       : 'quantitativeValue',
                        label      : editor.getLang('wpsc.value', 'Value'),
                        value      : '',
                        placeholder: '40.00',
                    },
                    {
                        type : 'container',
                        name : 'container',
                        label: '',
                        html : `<h1 style="font-weight: bold;">${editor.getLang('wpsc.jobMeta', 'Job Meta')}</h1>`
                    },
                    {
                        type  : 'listbox',
                        name  : 'employmentType',
                        label : editor.getLang('wpsc.employmentType', 'CSS class'),
                        values: [
                            {text: editor.getLang('wpsc.employmentType', 'Full Time'), value: 'FULL_TIME'},
                            {text: editor.getLang('wpsc.employmentType', 'Part Time'), value: 'PART_TIME'},
                            {text: editor.getLang('wpsc.employmentType', 'Contractor'), value: 'CONTRACTOR'},
                            {text: editor.getLang('wpsc.employmentType', 'Temporary'), value: 'TEMPORARY'},
                            {text: editor.getLang('wpsc.employmentType', 'Intern'), value: 'INTERN'},
                            {text: editor.getLang('wpsc.employmentType', 'Volunteer'), value: 'VOLUNTEER'},
                            {text: editor.getLang('wpsc.employmentType', 'Per Diem'), value: 'PER_DIEM'},
                            {text: editor.getLang('wpsc.employmentType', 'Other'), value: 'OTHER'}
                        ],
                    },
                    {
                        type   : 'textbox',
                        name   : 'validThrough',
                        label  : `${editor.getLang('wpsc.validTrough', 'Valid Through')} ${postfixDateLabel}`,
                        classes: 'sc_valid_through',
                    },
                    {
                        type : 'textbox',
                        name : 'sc_cssClass',
                        label: editor.getLang('wpsc.cssClass', 'CSS class'),
                        value: '',
                    },
                ],
                onsubmit  : e => {
                    editor.insertContent(
                        `[sc_fs_job
                        html = '${e.data.giveHTML}'
                        title = '${e.data.jobTitle}'
                        title_tag = '${e.data.titleTag}'
                        valid_through = '${e.data.validThrough}'
                        employment_type = '${e.data.employmentType}'
                        company_name = '${e.data.companyName}'
                        same_as = '${e.data.sameAs}'
                        logo_id = '${e.data.sc_img}'
                        street_address = '${e.data.streetAddress}'
                        address_locality = '${e.data.addressLocality}'
                        address_region = '${e.data.addressRegion}'
                        postal_code = '${e.data.postalCode}'
                        address_country = '${e.data.addressCountry}'
                        currency_code = '${e.data.currencyCode}'
                        quantitative_value = '${e.data.quantitativeValue}'
                        base_salary = '${e.data.baseSalary}'
                        css_class = '${e.data.sc_cssClass}'
                ]${e.data.description}[/sc_fs_job]`
                    );
                },
            })
            ;
            if (dateSupported()) {
                document.querySelector('.mce-sc_valid_through').type = 'date';
            }
            bindImageButtons();
        },
    }
};

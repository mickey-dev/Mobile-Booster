export default function (editor) {
    return {
        text   : editor.getLang('wpsc.courseButtonText', 'Course'),
        tooltip: editor.getLang('wpsc.courseTooltip', 'Adds a Course block to the page.'),
        onclick: () => {
            editor.windowManager.open({
                title     : editor.getLang('wpsc.coursePopupTitle', 'Featured Snippet Course'),
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
                        label      : editor.getLang('wpsc.course', 'Course Name'),
                        value      : '',
                        placeholder: editor.getLang('wpsc.coursePlaceholder', 'Enter Your Course Name here...'),
                        multiline  : true,
                    },
                    {
                        type       : 'textbox',
                        name       : 'description',
                        label      : editor.getLang('wpsc.description', 'Description'),
                        value      : '',
                        placeholder: editor.getLang('wpsc.description', 'Enter your description here...'),
                        multiline  : true,
                        minHeight  : 100,
                    },
                    {
                        type : 'container',
                        name : 'container',
                        label: '',
                        html : `<h1 style="font-weight: bold;">${editor.getLang('wpsc.providerInformation', 'Provider Information')}</h1>`
                    },
                    {
                        type       : 'textbox',
                        name       : 'providerName',
                        label      : editor.getLang('wpsc.providerName', 'Provider Name'),
                        value      : '',
                        placeholder: editor.getLang('wpsc.providerName', 'Provider Name'),
                        multiline  : false,
                    },
                    {
                        type       : 'textbox',
                        name       : 'providerSameAs',
                        label      : editor.getLang('wpsc.sameAs', 'Same as (Website / Social Media)'),
                        value      : '',
                        placeholder: editor.getLang('wpsc.sameAsPlaceholder', 'https://your-website.com'),
                        multiline  : false,
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
                        `[sc_fs_course 
                            html="${e.data.giveHTML}" 
                            title="${e.data.title}" 
                            title_tag="${e.data.titleTag}"
                            provider_name="${e.data.providerName}"
                            provider_same_as="${e.data.providerSameAs}"
                            css_class="${e.data.cssClass}"
                ]
                ${e.data.description}
                [/sc_fs_course]`
                    );
                }
                ,
            });
        },
    }
};

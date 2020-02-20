export default function (editor) {
    return {
        text   : 'Course',
        tooltip: 'Adds a Course block to the page.',
        onclick: () => {
            editor.windowManager.open({
                title     : 'Featured Snippet Course',
                minWidth  : 500,
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
                        placeholder: 'Enter Your Course Title...',
                        multiline  : true,
                    },
                    {
                        type       : 'textbox',
                        name       : 'description',
                        label      : 'Description',
                        value      : '',
                        placeholder: 'Enter your Course Description here...',
                        multiline  : true,
                        minHeight  : 100,
                    },
                    {
                        type : 'container',
                        name : 'container',
                        label: '',
                        html : '<h1 style="font-weight: bold;">Provider</h1>'
                    },
                    {
                        type       : 'textbox',
                        name       : 'providerName',
                        label      : 'Name',
                        value      : '',
                        placeholder: 'Provider Name',
                        multiline  : false,
                    },
                    {
                        type       : 'textbox',
                        name       : 'providerSameAs',
                        label      : 'Same As',
                        value      : '',
                        placeholder: 'https://example.com',
                        multiline  : false,
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

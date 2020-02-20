export default function (editor) {
    return {
        text   : 'Single FAQ',
        tooltip: 'Adds a FAQ block to the page.',
        onclick: () => {
            editor.windowManager.open({
                title     : 'Featured Snippet FAQ',
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
                        name  : 'sc_headline',
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
                        label      : 'Question',
                        type       : 'textbox',
                        name       : 'sc_question',
                        value      : '',
                        placeholder: 'Please enter your question here ...',
                        multiline  : true,
                    },
                    {
                        type       : 'textbox',
                        name       : 'sc_answer',
                        label      : 'Answer',
                        value      : '',
                        placeholder: 'Please enter your answer here ...',
                        multiline  : true,
                        minHeight  : 100,
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
                    }, // new stuff!
                    {
                        type     : 'textbox',
                        name     : 'sc_img_description',
                        label    : 'Image description',
                        value    : '',
                        multiline: true,
                    },
                    {
                        type : 'textbox',
                        name : 'sc_css_classes',
                        label: 'CSS classes',
                        value: '',
                    },
                ],
                onsubmit  : e => {
                    editor.insertContent(
                        `[sc_fs_faq 
                        sc_id="${'fs_faq' + Math.random().toString(36).substr(2, 9)}"
						html="${e.data.giveHTML}" 
                        headline="${e.data.sc_headline}" 
                        img="${e.data.sc_img}" 
                        question="${e.data.sc_question}" 
                        img_alt="${e.data.sc_img_description}" 
                        css_class="${e.data.sc_css_classes}"
                    ]${e.data.sc_answer}[/sc_fs_faq]`
                    );
                }
            });
            bindImageButtons();
        },
    }
};

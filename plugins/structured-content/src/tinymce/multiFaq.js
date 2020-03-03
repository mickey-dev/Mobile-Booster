import './tinymce.css';

export default function (editor) {
    return {
        text   : editor.getLang('wpsc.multiFaqButtonText', 'Multi FAQ'),
        tooltip: editor.getLang('wpsc.multiFaqTooltip', 'Adds multiple FAQ blocks to the page.'),
        onclick: () => {
            editor.windowManager.open({
                title     : editor.getLang('wpsc.faqTitle', 'Featured Snippet FAQ'),
                minWidth  : 500,
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
                        type       : 'textbox',
                        name       : 'sc_css_classes',
                        label      : editor.getLang('wpsc.cssClass', 'CSS class'),
                        placeholder: editor.getLang('wpsc.cssClassPlaceholder', 'additional css classes ...'),
                        value      : '',
                    },
                    {
                        type : 'container',
                        name : 'container',
                        label: '',
                        html : ` 
                                    <form id="sc-start-point">
                                    <div id="fields">
                                        <fieldset id="fieldset-0" data-key="0">
                                            <hr class="sc-hr">
                                            <div>
                                                <label>${editor.getLang('wpsc.titleTag', 'Title Tag')}</label>
                                                <select name="headlineTag" id="headlineTag-0">
                                                    <option value="h2">h2</option>
                                                    <option value="h3">h3</option>
                                                    <option value="h4">h4</option>
                                                    <option value="h5">h5</option>
                                                    <option value="h6">h6</option>
                                                    <option value="p">p</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label>${editor.getLang('wpsc.question', 'Question')}</label>
                                                <input type="text" id="question-0" name="question" placeholder="${editor.getLang('wpsc.questionPlaceholder', 'Enter Your Question here...')}">
                                            </div>
                                            <div>
                                                <label>${editor.getLang('wpsc.answer', 'Answer')}</label>
                                                <textarea id="answer-0" rows="5" name="answer" placeholder="${editor.getLang('wpsc.answerPlaceholder', 'Enter your answer here...')}"></textarea>
                                            </div>
                                            <div>
                                                <div type="text" id="imageID-0" name="imageID"></div>
                                                <div class="mce-btn">
                                                    <button type="button" class="mce-select_image" data-target="imageID-0">${editor.getLang('wpsc.addImage', 'Add Image')}</button>
                                                </div>
                                            </div> 
                                        </fieldset>
                                    </div>
                                    <div class="mce-btn long">
                                        <button id="addOne" type="button">${editor.getLang('wpsc.addOne', 'Answer')}</button>
                                    </div>
                                </form>`
                    },
                ],
                onsubmit  : e => {
                    editor.insertContent(createShortcode(e));
                },
            });
            document.getElementById('addOne').addEventListener('click', () => {
                let id            = document.querySelectorAll('#fields fieldset').length,
                    baseHeight    = document.querySelector(`#fields #fieldset-${id - 1}`).offsetHeight,
                    height        = id === 1 ? baseHeight + 30 : baseHeight - 30,
                    layoutWrapper = document.querySelector('.mce-container > .mce-container-body.mce-abs-layout'),
                    nextField     = document.querySelector(`#fields #fieldset-${id - 1}`);

                const template = `
                    <fieldset id="fieldset-${id}" data-key="${id}">
                        <hr class="sc-hr">
                        <div>
                            <label>${editor.getLang('wpsc.titleTag', 'Title Tag')}</label>
                            <select name="headlineTag" id="headlineTag-${id}">
                                <option value="h2">h2</option>
                                <option value="h3">h3</option>
                                <option value="h4">h4</option>
                                <option value="h5">h5</option>
                                <option value="h6">h6</option>
                                <option value="p">p</option>
                            </select>
                        </div>
                        <div>
                            <label>${editor.getLang('wpsc.question', 'Question')}</label>
                            <input type="text" id="question-${id}" name="question" placeholder="${editor.getLang('wpsc.questionPlaceholder', 'Enter Your Question here...')}">
                        </div>
                        <div>
                            <label>${editor.getLang('wpsc.answer', 'Answer')}</label>
                            <textarea id="answer-${id}" rows="5" name="answer" placeholder="${editor.getLang('wpsc.answerPlaceholder', 'Enter your answer here...')}"></textarea>
                        </div>
                        <div>
                            <div type="text" id="imageID-${id}" name="imageID"></div>
                            <div class="mce-btn">
                                <button type="button"  class="mce-select_image" data-target="imageID-${id}">${editor.getLang('wpsc.addImage', 'Add Image')}</button>
                            </div>
                        </div>
                        <div class="mce-btn removeLast">
                            <button type="button" onclick="removeLastFAQ()" data-target="bild-${id}">- ${editor.getLang('wpsc.removeLastOne', 'Add Image')}</button>
                        </div>
                    </fieldset>
                `;

                setHeight(layoutWrapper, layoutWrapper.offsetHeight + height);
                insertAfter(createElementFromHTML(template), nextField);
                bindImageButtons();
            });
            bindImageButtons();
        },
    }
};


window.createShortcode = function (e) {
    let shortcode = `[sc_fs_multi_faq `,
        fieldsets = document.querySelectorAll('#sc-start-point fieldset');

    for (let i = 0; i < fieldsets.length; i++) {

        const key         = fieldsets[i].dataset.key,
              headlineTag = document.getElementById('headlineTag-' + key).value,
              question    = document.getElementById('question-' + key).value,
              answer      = document.getElementById('answer-' + key).value,
              imageID     = document.getElementById('imageID-' + key).innerHTML;

        shortcode += `headline-${key}="${headlineTag}" question-${key}="${question}" answer-${key}="${answer}" image-${key}="${imageID}" `;
    }

    shortcode += ` count="${fieldsets.length}" html="${e.data.giveHTML}" css_class="${e.data.sc_css_classes}"]`;

    return shortcode;
};

window.removeLastFAQ = function () {
    document.querySelector('#sc-start-point fieldset:last-of-type').remove();
};

/**
 /* Internal dependencies
 */
import {icons, iconColor} from '../../utils/icons.jsx'
import {escapeQuotes,} from '../../utils/helper.jsx'
import SC_Button from '../../components/scButtons/index.jsx'
import InfoLabel from '../../components/infoLabel/index.jsx'
import VisibleLabel from '../../components/visibleLabel/index.jsx'

/**
 /* WordPress dependencies
 */
const {__} = wp.i18n // Import __() from wp.i18n
const {Fragment} = wp.element
const {RichText, PlainText, AlignmentToolbar, MediaUpload, InspectorControls, BlockControls} = wp.blockEditor
const {PanelRow, PanelBody, SelectControl, TextControl} = wp.components
const {registerBlockType} = wp.blocks

/* Block constants
*/
const name = 'job'
const blockTitle = __('Job', 'structured-content')
const icon = {src: icons[name], foreground: iconColor}

const keywords = [
    __('job search', 'structured-content'),
    __('job offer', 'structured-content'),
    __('structured-content', 'structured-content'),
]

const blockAttributes = {
    title             : {
        type   : 'string',
        default: 'Job Title'
    },
    titleTag          : {
        type   : 'string',
        default: 'h2',
    },
    description       : {
        type   : 'html',
        default: '',
    },
    valid_through     : {
        type   : 'string',
        default: '',
    },
    company_name      : {
        type   : 'string',
        default: '',
    },
    employment_type   : {
        type   : 'string',
        default: 'FULL_TIME',
    },
    same_as           : {
        type   : 'string',
        default: '',
    },
    street_address    : {
        type   : 'string',
        default: '',
    },
    address_locality  : {
        type   : 'string',
        default: '',
    },
    postal_code       : {
        type   : 'string',
        default: '',
    },
    address_region    : {
        type   : 'string',
        default: '',
    },
    address_country   : {
        type   : 'string',
        default: '',
    },
    base_salary       : {
        type   : 'string',
        default: 'HOUR'
    },
    currency_code     : {
        type   : 'string',
        default: '',
    },
    quantitative_value: {
        type   : 'string',
        default: '',
    },
    logo_id           : {
        type   : 'number',
        default: ''
    },
    imageAlt          : {
        type   : 'string',
        default: ''
    },
    thumbnailImageUrl : {
        type   : 'string',
        default: ''
    },
    css_class         : {
        type   : 'string',
        default: ''
    },
    textAlign         : {
        type: 'string',
    },
    html              : {
        type   : 'bool',
        default: true,
    },
}
/* Register: aa Gutenberg Block.
/*
/* Registers a new block provided a unique name and an object defining its
/* behavior. Once registered, the block is made editor as an option to any
/* editor interface where blocks are implemented.
/*
/* @link https://wordpress.org/gutenberg/handbook/block-api/
/* @param  {string}   name     Block name.
/* @param  {Object}   settings Block settings.
/* @return {?WPBlock}          The block, if it has been successfully
/*                             registered otherwise `undefined`.
*/
registerBlockType(`structured-content/${name}`, {
    title   : blockTitle, // Block title.
    icon    : icon,
    category: 'structured-content',
    keywords: keywords,

    attributes: blockAttributes,

    supports: {
        align          : ['wide', 'full'],
        stackedOnMobile: true,
    },

    edit: ({
               attributes,
               className,
               isSelected,
               setAttributes,
           }) => {

        const {
                  align,
                  textAlign,
                  titleTag,
                  title,
                  css_class,
                  description,
                  same_as,
                  company_name,
                  street_address,
                  address_locality,
                  postal_code,
                  address_region,
                  address_country,
                  base_salary,
                  currency_code,
                  quantitative_value,
                  valid_through,
                  employment_type,
                  logo_id,
                  imageAlt,
                  thumbnailImageUrl,
                  html,
              } = attributes

        function onImageSelect(imageObject) {
            setAttributes({
                logo_id          : imageObject.id,
                imageAlt         : imageObject.alt,
                thumbnailImageUrl: imageObject.sizes.thumbnail.url,
            })
        }

        function onRemoveImage() {
            setAttributes({
                logo_id          : null,
                imageAlt         : null,
                thumbnailImageUrl: '',
            })
        }

        const employmentOptions = [
            {label: __('Select a Type', 'structured-content'), value: null},
            {label: __('Full Time', 'structured-content'), value: 'FULL_TIME'},
            {label: __('Part Time', 'structured-content'), value: 'PART_TIME'},
            {label: __('Contractor', 'structured-content'), value: 'CONTRACTOR'},
            {label: __('Temporary', 'structured-content'), value: 'TEMPORARY'},
            {label: __('Intern', 'structured-content'), value: 'INTERN'},
            {label: __('Volunteer', 'structured-content'), value: 'VOLUNTEER'},
            {label: __('Per Diem', 'structured-content'), value: 'PER_DIEM'},
            {label: __('Other', 'structured-content'), value: 'OTHER'},
        ];

        const baseSalaryOptions = [
            {label: __('Select a Type', 'structured-content'), value: null},
            {label: __('Hourly', 'structured-content'), value: 'HOUR'},
            {label: __('Daily', 'structured-content'), value: 'DAY'},
            {label: __('Weekly', 'structured-content'), value: 'WEEK'},
            {label: __('Monthly', 'structured-content'), value: 'MONTH'},
            {label: __('Yearly', 'structured-content'), value: 'YEAR'},

        ];

        return [
            <Fragment>
                {isSelected && (
                    <Fragment>
                        <BlockControls>
                            <AlignmentToolbar
                                value={textAlign}
                                onChange={(nextTextAlign) => setAttributes({textAlign: nextTextAlign})}
                            />
                        </BlockControls>
                    </Fragment>
                )}
                {isSelected && (
                    <Fragment>
                        <InspectorControls>
                            <PanelBody>
                                <PanelRow>
                                    <SelectControl
                                        label={__('Title tag', 'structured-content')}
                                        value={titleTag}
                                        className="w-100"
                                        options={[
                                            {label: 'H2', value: 'h2'},
                                            {label: 'H3', value: 'h3'},
                                            {label: 'H4', value: 'h4'},
                                            {label: 'H5', value: 'h5'},
                                            {label: 'p', value: 'p'},
                                        ]}
                                        onChange={(titleTag) => {
                                            setAttributes({titleTag: titleTag})
                                        }}
                                    />
                                </PanelRow>
                                <PanelRow>
                                    <TextControl
                                        label={__('CSS class', 'structured-content')}
                                        className="w-100"
                                        value={css_class}
                                        placeholder={__('additional css classes ...', 'structured-content')}
                                        onChange={(css_class) => setAttributes({css_class: css_class})}
                                    />
                                </PanelRow>
                            </PanelBody>
                        </InspectorControls>
                    </Fragment>
                )}
                <section
                    className={
                        className,
                        align && `align${align}`,
                        css_class ? css_class : `sc_card`
                    }
                    style={{
                        textAlign: textAlign,
                    }}>
                    <div className="sc_toggle-bar">
                        <div onClick={() => {
                            setAttributes({html: !html})
                        }}>
                            <VisibleLabel visible={html}/>
                        </div>
                        <InfoLabel url="https://developers.google.com/search/docs/data-types/job-posting"/>
                    </div>
                    <div>
                        {wp.element.createElement(titleTag, {},
                            <PlainText
                                placeholder={__('Enter Your job title here...', 'structured-content')}
                                value={title}
                                className='wp-block-structured-content-job__title'
                                tag={titleTag}
                                onChange={(value) => setAttributes({title: value})}
                                keepplaceholderonfocus="true"
                            />
                        )}
                        <div>
                            <div className="answer" itemProp="text">
                                <RichText
                                    placeholder={__('Enter your job description here...', 'structured-content')}
                                    value={description}
                                    className='wp-block-structured-content-job__text'
                                    onChange={(value) => setAttributes({description: value})}
                                    keepplaceholderonfocus="true"
                                />
                            </div>
                        </div>
                        <div className="sc_row" style={{marginTop: 15}}>
                            <div className="sc_grey-box">
                                <div className="sc_box-label">
                                    {__('Company', 'structured-content')}
                                </div>
                                <div style={{display: 'grid', gridTemplateColumns: '2fr 1fr', gridColumnGap: 15}}>
                                    <div className="sc_company-infos">
                                        <div className="sc_input-group">
                                            <div className="sc_input-label">
                                                {__('Name', 'structured-content')}
                                            </div>
                                            <TextControl
                                                type="text"
                                                value={company_name}
                                                placeholder="Company Name"
                                                className="wp-block-structured-content-job__company_name"
                                                onChange={(company_name) => setAttributes({company_name: company_name})}
                                            />
                                        </div>
                                        <div className="sc_input-group">
                                            <div className="sc_input-label">
                                                {__('Same as (Website / Social Media)', 'structured-content')}
                                            </div>
                                            <TextControl
                                                type="url"
                                                value={same_as}
                                                placeholder={__('https://your-website.com', 'structured-content')}
                                                className="wp-block-structured-content-job__same_as"
                                                onChange={(same_as) => setAttributes({same_as: same_as})}
                                            />
                                        </div>
                                    </div>
                                    <div className="sc_company-logo">
                                        <div className="sc_input-group">
                                            <div className="sc_input-label">
                                                {__('Logo', 'structured-content')}
                                            </div>
                                            <div>
                                                {!thumbnailImageUrl ?
                                                    <MediaUpload
                                                        onSelect={onImageSelect}
                                                        type="image"
                                                        value={logo_id}
                                                        render={({open}) => (
                                                            <SC_Button action={open} className="no-margin-top">
                                                                {__('Add Image', 'structured-content')}
                                                            </SC_Button>
                                                        )}
                                                    />
                                                    :
                                                    <div>
                                                        <div className="image-wrapper">
                                                            <img itemProp="image" src={thumbnailImageUrl}/>
                                                        </div>
                                                        <SC_Button action={onRemoveImage} className="no-margin-top">
                                                            {__('Remove Image', 'structured-content')}
                                                        </SC_Button>
                                                    </div>
                                                }
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="sc_grey-box">
                                <div className="sc_box-label">
                                    {__('Job Location', 'structured-content')}
                                </div>
                                <div className="sc_input-group">
                                    <div className="sc_input-label">
                                        {__('Street', 'structured-content')}
                                    </div>
                                    <TextControl
                                        placeholder={__('Any Street 3A', 'structured-content')}
                                        type="text"
                                        value={street_address}
                                        className="wp-block-structured-content-job__street_address"
                                        onChange={(street_address) => setAttributes({street_address: street_address})}
                                    />
                                </div>
                                <div className="sc_row">
                                    <div className="sc_input-group">
                                        <div className="sc_input-label">
                                            {__('Postal Code', 'structured-content')}
                                        </div>
                                        <TextControl
                                            placeholder={__('Any Postal Code', 'structured-content')}
                                            type="text"
                                            value={postal_code}
                                            className="wp-block-structured-content-job__postal_code"
                                            onChange={(postal_code) => setAttributes({postal_code: postal_code})}
                                        />
                                    </div>
                                    <div className="sc_input-group">
                                        <div className="sc_input-label">
                                            {__('Locality', 'structured-content')}
                                        </div>
                                        <TextControl
                                            placeholder={__('Any City', 'structured-content')}
                                            type="text"
                                            value={address_locality}
                                            className="wp-block-structured-content-job__address_locality"
                                            onChange={(address_locality) => setAttributes({address_locality: address_locality})}
                                        />
                                    </div>
                                </div>
                                <div className="sc_row">
                                    <div className="sc_input-group">
                                        <div className="sc_input-label">
                                            {__('Country ISO Code', 'structured-content')}
                                        </div>
                                        <TextControl
                                            placeholder={__('US', 'structured-content')}
                                            type="text"
                                            value={address_country}
                                            className="wp-block-structured-content-job__address_country"
                                            onChange={(address_country) => setAttributes({address_country: address_country})}
                                        />
                                    </div>
                                    <div className="sc_input-group">
                                        <div className="sc_input-label">
                                            {__('Region ISO Code', 'structured-content')}
                                        </div>
                                        <TextControl
                                            placeholder={__('CA', 'structured-content')}
                                            type="text"
                                            value={address_region}
                                            className="wp-block-structured-content-job__address_region"
                                            onChange={(address_region) => setAttributes({address_region: address_region})}
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="sc_row" style={{marginTop: 15}}>
                            <div className="sc_grey-box">
                                <div className="sc_box-label">
                                    {__('Salary', 'structured-content')}
                                </div>
                                <div className="sc_input-group">
                                    <div className="sc_input-label">
                                        {__('Unit', 'structured-content')}
                                    </div>
                                    <SelectControl
                                        value={base_salary}
                                        className="w-100"
                                        options={baseSalaryOptions}
                                        onChange={(base_salary) => {
                                            setAttributes({base_salary: base_salary})
                                        }}
                                    />
                                </div>
                                <div className="sc_row">
                                    <div className="sc_input-group">
                                        <div className="sc_input-label">
                                            {__('Currency ISO Code', 'structured-content')}
                                        </div>
                                        <TextControl
                                            placeholder={__('USD', 'structured-content')}
                                            value={currency_code}
                                            type="text"
                                            className='wp-block-structured-content-job__currency'
                                            onChange={(currency_code) => setAttributes({currency_code: currency_code})}
                                        />
                                    </div>
                                    <div className="sc_input-group">
                                        <div className="sc_input-label">
                                            {__('Value', 'structured-content')}
                                        </div>
                                        <TextControl
                                            placeholder="40"
                                            type="number"
                                            value={quantitative_value}
                                            className="wp-block-structured-content-job__quantitative_value"
                                            onChange={(quantitative_value) => setAttributes({quantitative_value: quantitative_value})}
                                        />
                                    </div>
                                </div>
                            </div>
                            <div className="sc_grey-box">
                                <div className="sc_box-label">
                                    {__('Job Meta', 'structured-content')}
                                </div>
                                <div className="sc_input-group">
                                    <div className="sc_input-label">
                                        {__('Employment Type', 'structured-content')}
                                    </div>
                                    <SelectControl
                                        value={employment_type}
                                        className="w-100"
                                        options={employmentOptions}
                                        onChange={(employment_type) => {
                                            setAttributes({employment_type: employment_type})
                                        }}
                                    />
                                </div>
                                <div className="sc_input-group">
                                    <div className="sc_input-label">
                                        {__('Valid Through', 'structured-content')}
                                    </div>
                                    <TextControl
                                        type="date"
                                        value={valid_through}
                                        onChange={(valid_through) => setAttributes({valid_through: valid_through})}
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </Fragment>
        ]
    },

    /**
     /* The save function defines the way in which the different attributes should be combined
     /* into the final markup, which is then serialized by Gutenberg into post_content.
     /*
     /* The "save" property must be specified and must be a valid function.
     /*
     /* @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
     */
    save: function (props) {

        const {attributes} = props
        attributes.description = escapeQuotes(attributes.description)
        return null
    }
})

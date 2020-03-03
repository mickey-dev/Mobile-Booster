/**
 * Internal dependencies
 */
import {icons, iconColor} from '../../utils/icons.jsx'
import SC_Button from '../../components/scButtons/index.jsx'
import InfoLabel from '../../components/infoLabel/index.jsx'
import VisibleLabel from '../../components/visibleLabel/index.jsx'
import {findNextFreeID, removeElement} from '../../utils/helper.jsx'

/**
 /* WordPress dependencies
 */
const {__} = wp.i18n
const {Fragment} = wp.element
const {AlignmentToolbar, MediaUpload, InspectorControls, BlockControls} = wp.blockEditor
const {PanelRow, PanelBody, TextControl} = wp.components
const {registerBlockType} = wp.blocks
/* Block constants
*/
const name = 'person'
const title = __('Person', 'structured-content')
const icon = {src: icons[name], foreground: iconColor}

const keywords = [
    __('person search', 'structured-content'),
    __('person offer', 'structured-content'),
    __('structured-content', 'structured-content'),
]

const blockAttributes = {
    person_name      : {
        type   : 'string',
        default: '',
    },
    job_title        : {
        type   : 'string',
        default: '',
    },
    street_address   : {
        type   : 'string',
        default: '',
    },
    address_locality : {
        type   : 'string',
        default: '',
    },
    postal_code      : {
        type   : 'string',
        default: '',
    },
    address_region   : {
        type   : 'string',
        default: '',
    },
    address_country  : {
        type   : 'string',
        default: '',
    },
    email            : {
        type   : 'string',
        default: '',
    },
    homepage         : {
        type   : 'string',
        default: '',
    },
    telephone        : {
        type   : 'string',
        default: '',
    },
    image_id         : {
        type   : 'number',
        default: ''
    },
    imageAlt         : {
        type   : 'string',
        default: ''
    },
    thumbnailImageUrl: {
        type   : 'string',
        default: ''
    },
    colleagues       : {
        type   : 'array',
        default: [],
    },
    colleague        : {
        type: 'string',
    },
    css_class        : {
        type   : 'string',
        default: ''
    },
    textAlign        : {
        type: 'string',
    },
    html             : {
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
    title   : title, // Block title.
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
                  css_class,
                  job_title,
                  person_name,
                  street_address,
                  address_locality,
                  postal_code,
                  address_region,
                  address_country,
                  email,
                  homepage,
                  telephone,
                  colleagues,
                  colleague,
                  image_id,
                  imageAlt,
                  thumbnailImageUrl,
                  html,
              } = attributes

        function onImageSelect(imageObject) {
            setAttributes({
                image_id         : imageObject.id,
                imageAlt         : imageObject.alt,
                thumbnailImageUrl: imageObject.sizes.thumbnail.url,
            })
        }

        function onRemoveImage() {
            setAttributes({
                image_id         : null,
                imageAlt         : null,
                thumbnailImageUrl: '',
            })
        }

        function addToColleague() {
            let id = findNextFreeID(colleagues);
            setAttributes({
                colleagues: [
                    ...colleagues,
                    {id: id, url: ''}
                ]
            })
        }

        function removeFromColleague(id) {
            setAttributes({colleagues: removeElement(id, colleagues)});
        }


        function colleaguesSave() {
            let list = ''
            colleagues.map(function (value, index) {
                if (value.url !== '')
                    list += `${value.url},`
            })
            list = list.substr(0, list.length - 1)
            setAttributes({colleague: list})
        }

        let colleaguesUrls =
                colleagues
                    .sort(function (a, b) {
                        return a.index - b.index
                    }).map((data, index) => {
                    return (
                        <div style={{
                            display            : 'grid',
                            gridTemplateColumns: '3fr auto',
                            gridColumnGap      : 5,
                            lineHeight         : 1,
                        }}
                             key={`url-${index}`}
                        >
                            <TextControl
                                type="text"
                                value={data.url}
                                placeholder={data.url !== '' ? data.url : __('http://www.xyz.edu/students/alicejones.html', 'structured-content')}
                                keepplaceholderonfocus="true"
                                className={`wp-block-structured-content-person__repeater-${data.id}`}
                                onChange={(value) => {
                                    setAttributes(
                                        colleagues[index] = {'id': data.id, 'url': value}
                                    )
                                    colleaguesSave()
                                }}
                            />
                            <div>
                                <SC_Button
                                    action={removeFromColleague.bind(this, data.id)}
                                    icon={true}
                                    className="inline"
                                    differentIcon={icons.minus}
                                />
                            </div>
                        </div>
                    )
                })
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
                        }}><VisibleLabel visible={html}/>
                        </div>
                        <InfoLabel url="https://developers.google.com/search/docs/data-types/person-posting"/>
                    </div>
                    <div>
                        <div className="sc_row mt-4" style={{marginTop: 15}}>
                            <div className="sc_grey-box">
                                <div className="sc_box-label">
                                    {__('Personal', 'structured-content')}
                                </div>
                                <div style={{display: 'grid', gridTemplateColumns: '2fr 1fr', gridColumnGap: 15}}>
                                    <div className="sc_person-infos">
                                        <div className="sc_input-group">
                                            <div className="sc_input-label">
                                                {__('Name', 'structured-content')}
                                            </div>
                                            <TextControl
                                                type="text"
                                                value={person_name}
                                                placeholder={__('Please enter your Name here ...', 'structured-content')}
                                                className="wp-block-structured-content-person__person_name"
                                                onChange={(person_name) => setAttributes({person_name: person_name})}
                                            />
                                        </div>
                                        <div className="sc_input-group" style={{marginTop: 15}}>
                                            <div className="sc_input-label">
                                                {__('Job Title', 'structured-content')}
                                            </div>
                                            <TextControl
                                                type="text"
                                                value={job_title}
                                                placeholder={__('Please enter your job title here ...', 'structured-content')}
                                                className="wp-block-structured-content-person__job_title"
                                                onChange={(job_title) => setAttributes({job_title: job_title})}
                                            />
                                        </div>
                                    </div>
                                    <div className="sc_person-image">
                                        <div className="sc_input-group">
                                            <div className="sc_input-label">
                                                {__('Image', 'structured-content')}
                                            </div>
                                            <div>
                                                {!thumbnailImageUrl ?
                                                    <MediaUpload
                                                        onSelect={onImageSelect}
                                                        type="image"
                                                        value={image_id}
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
                                    {__('Contact', 'structured-content')}
                                </div>
                                <div className="sc_input-group">
                                    <div className="sc_input-label">
                                        {__('E-Mail', 'structured-content')}
                                    </div>
                                    <TextControl
                                        placeholder={__('jane-doe@xyz.edu', 'structured-content')}
                                        value={email}
                                        type="email"
                                        className='wp-block-structured-content-person__email'
                                        onChange={(email) => setAttributes({email: email})}
                                    />
                                </div>
                                <div className="sc_input-group" style={{marginTop: 15}}>
                                    <div className="sc_input-label">
                                        {__('URL', 'structured-content')}
                                    </div>
                                    <TextControl
                                        placeholder={__('http://www.janedoe.com', 'structured-content')}
                                        value={homepage}
                                        type="url"
                                        className='wp-block-structured-content-person__homepage'
                                        onChange={(homepage) => setAttributes({homepage: homepage})}
                                    />
                                </div>
                                <div className="sc_input-group" style={{marginTop: 15}}>
                                    <div className="sc_input-label">
                                        {__('Telephone', 'structured-content')}
                                    </div>
                                    <TextControl
                                        placeholder={__('(425) 123-4567', 'structured-content')}
                                        value={telephone}
                                        type="tel"
                                        className='wp-block-structured-content-person__telephone'
                                        onChange={(telephone) => setAttributes({telephone: telephone})}
                                    />
                                </div>
                            </div>
                        </div>
                        <div className="sc_row" style={{marginTop: 15}}>
                            <div className="sc_grey-box">
                                <div className="sc_box-label">
                                    {__('Address', 'structured-content')}
                                </div>
                                <div className="sc_input-group">
                                    <div className="sc_input-label">
                                        {__('Street', 'structured-content')}
                                    </div>
                                    <TextControl
                                        placeholder={__('Any Street 3A', 'structured-content')}
                                        type="text"
                                        value={street_address}
                                        className="wp-block-structured-content-person__street_address"
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
                                            className="wp-block-structured-content-person__postal_code"
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
                                            className="wp-block-structured-content-person__address_locality"
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
                                            className="wp-block-structured-content-person__address_country"
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
                                            className="wp-block-structured-content-person__address_region"
                                            onChange={(address_region) => setAttributes({address_region: address_region})}
                                        />
                                    </div>
                                </div>
                            </div>

                            <div className="sc_grey-box">
                                <div className="sc_box-label">
                                    {__('Colleague', 'structured-content')}
                                </div>
                                <div className="sc_input-group" style={{marginTop: 15}}>
                                    <div className="sc_input-label">
                                        {__('URL', 'structured-content')}
                                    </div>
                                    <div>
                                        <div>{colleaguesUrls}</div>
                                        <SC_Button action={addToColleague} icon={true}>
                                            {__('Add One', 'structured-content')}
                                        </SC_Button>
                                    </div>
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
        return null
    }
})

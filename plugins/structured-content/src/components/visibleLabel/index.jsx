import React, { Component } from 'react';

import { icons } from '../../utils/icons.jsx';

class VisibleLayer extends Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return (
            <div style={ { cursor: 'pointer' } }>
                { this.props.visible ? icons.openEye : icons.closedEye }
            </div>
        );
    }
}

export default VisibleLayer;
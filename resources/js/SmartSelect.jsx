import React from 'react';
import ReactDOM from 'react-dom';
import Select from 'react-select';

export const customStyles = {
    control: (provided, state) => ({
        ...provided,
        background: '#fff',
        borderColor: '#EAEAEA',
        borderRadius: '30px',
        minHeight: '50px',
        width: '90%',
        fontSize: '13px',
        boxShadow: state.isFocused ? null : null,
    }),

    valueContainer: (provided, state) => ({
        ...provided,
        padding: '0 10px'
    }),

    input: (provided, state) => ({
        ...provided,
        margin: '0px',
    }),
    indicatorSeparator: state => ({
        display: 'none',
    }),
    indicatorsContainer: (provided, state) => ({
        ...provided,
        height: '50px',
    }),
};

export const SmartSelect = ({name, placeholder, options =[], values=[], multi = false, isDisabled = false}) => {
    multi = multi === 'true';
    isDisabled = isDisabled === 'true';
    return (
        <Select name={name} styles={customStyles} placeholder={placeholder} options={options} defaultValue={values} isMulti={multi} isDisabled={isDisabled} />
    )
};

document.querySelectorAll('.SmartSelectComponent').forEach((item)=>{
    const props = Object.assign({}, item.dataset);
    props.options = JSON.parse(props.options);
    props.values = JSON.parse(props.values);
    ReactDOM.render(<SmartSelect {...props} />, item);
})

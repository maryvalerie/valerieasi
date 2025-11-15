import React from 'react';

const MessageDisplay = ({ message, visible }) => {
    return (
        <div className="mt-4">
            {/* Conditional Rendering */}
            { visible ? (
                <p className='text-green-600 font-semibold'>{message}</p>
            ) : (
                <p className= 'text-gray-400 italic'>Message is Hidden.</p>
            )}
        </div>    

     );
};

export default MessageDisplay;
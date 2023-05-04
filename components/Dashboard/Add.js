import React, { useState } from 'react';
import Swal from 'sweetalert2';

const Add = ({ users, setUsers, setIsAdding }) => {
  const [Name, setName] = useState('');
  const [Points, setPoints] = useState('');
  

  const handleAdd = e => {
    e.preventDefault();

    if (!Name || !Points ) {
      return Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: 'All fields are required.',
        showConfirmButton: true,
      });
    }

    const id = users.length + 1;
    const newUser = {
      id,
      Name,
      Points,
    };

    users.push(newUser);
    localStorage.setItem('users_data', JSON.stringify(users));
    setUsers(users);
    setIsAdding(false);

    Swal.fire({
      icon: 'success',
      title: 'Added!',
      text: `${Name} ${Points}'s data has been Added.`,
      showConfirmButton: false,
      timer: 1500,
    });
  };

  return (
    <div className="small-container">
      <form onSubmit={handleAdd}>
        <h1>Add User</h1>
        <label htmlFor="Name">First Name</label>
        <input
          id="Name"
          type="text"
          name="Name"
          value={Name}
          onChange={e => setName(e.target.value)}
        />
        <label htmlFor="Points">Points</label>
        <input
          id="Points"
          type="text"
          name="Points"
          value={Points}
          onChange={e => setPoints(e.target.value)}
        />
       
        <div style={{ marginTop: '30px' }}>
          <input type="submit" value="Add" />
          <input
            style={{ marginLeft: '12px' }}
            className="muted-button"
            type="button"
            value="Cancel"
            onClick={() => setIsAdding(false)}
          />
        </div>
      </form>
    </div>
  );
};

export default Add;
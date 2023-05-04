import React, { useState } from 'react';
import Swal from 'sweetalert2';

const Edit = ({ users, selectedUser, setUsers, setIsEditing }) => {
  const id = selectedUser.id;

  const [Name, setName] = useState(selectedUser.Name);
  const [Points, setPoints] = useState(selectedUser.setPoints);
 

  const handleUpdate = e => {
    e.preventDefault();

    if (!Name || !setPoints) {
      return Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: 'All fields are required.',
        showConfirmButton: true,
      });
    }

    const user = {
      id,
      Name,
      Points,
    };

    for (let i = 0; i < users.length; i++) {
      if (users[i].id === id) {
        users.splice(i, 1, user);
        break;
      }
    }

    localStorage.setItem('users_data', JSON.stringify(users));
    setUsers(users);
    setIsEditing(false);

    Swal.fire({
      icon: 'success',
      title: 'Updated!',
      text: `${user.Name} ${user.Points}'s data has been updated.`,
      showConfirmButton: false,
      timer: 1500,
    });
  };

  return (
    <div className="small-container">
      <form onSubmit={handleUpdate}>
        <h1>Edit user</h1>
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
          <input type="submit" value="Update" />
          <input
            style={{ marginLeft: '12px' }}
            className="muted-button"
            type="button"
            value="Cancel"
            onClick={() => setIsEditing(false)}
          />
        </div>
      </form>
    </div>
  );
};

export default Edit;

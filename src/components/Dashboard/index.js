import React, { useState, useEffect } from 'react';
import Swal from 'sweetalert2';

import Header from './Header';
import Table from './Table';
import Add from './Add';
import Edit from './Edit';

import { usersData } from '../../data';

const Dashboard = ({ setIsAuthenticated }) => {
  const [users, setUsers] = useState(usersData);
  const [selectedUser, setselectedUser] = useState(null);
  const [isAdding, setIsAdding] = useState(false);
  const [isEditing, setIsEditing] = useState(false);

  useEffect(() => {
    const data = JSON.parse(localStorage.getItem('users_data'));
    if (data !== null && Object.keys(data).length !== 0) setUsers(data);
  }, []);

  const handleEdit = id => {
    const [user] = users.filter(user => user.id === id);

    setselectedUser(user);
    setIsEditing(true);
  };

  const handleDelete = id => {
    Swal.fire({
      icon: 'warning',
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
    }).then(result => {
      if (result.value) {
        const [user] = users.filter(user => user.id === id);

        Swal.fire({
          icon: 'success',
          title: 'Deleted!',
          text: `${user.firstName} ${user.lastName}'s data has been deleted.`,
          showConfirmButton: false,
          timer: 1500,
        });

        const usersCopy = users.filter(user => user.id !== id);
        localStorage.setItem('users_data', JSON.stringify(usersCopy));
        setUsers(usersCopy);
      }
    });
  };

  return (
    <div className="container">
      {!isAdding && !isEditing && (
        <>
          <Header
            setIsAdding={setIsAdding}
            setIsAuthenticated={setIsAuthenticated}
          />
          <Table
            users={users}
            handleEdit={handleEdit}
            handleDelete={handleDelete}
          />
        </>
      )}
      {isAdding && (
        <Add
          users={users}
          setUsers={setUsers}
          setIsAdding={setIsAdding}
        />
      )}
      {isEditing && (
        <Edit
          users={users}
          selectedUser={selectedUser}
          setUsers={setUsers}
          setIsEditing={setIsEditing}
        />
      )}
    </div>
  );
};

export default Dashboard;

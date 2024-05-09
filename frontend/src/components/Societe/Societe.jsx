import Societeapi from '@/services/Admin/Societeapi';
import React, { useState, useEffect } from 'react';

function Societe() {
    const [formData, setFormData] = useState({
        id: '',
        : '',
        pannes: '',
        PlaceRestantes: '',
    });
    const [error, setError] = useState("");
    const [parkings, setParkings] = useState([]);

    useEffect(() => {
        fetchParkings();
    }, []);

    const fetchParkings = async () => {
        try {
            const response = await ParkingApi.all();
            setParkings(response.data);
        } catch (error) {
            console.error("Error fetching parkings:", error);
        }
    };

    const handleInput = (event) => {
        setFormData({ ...formData, [event.target.name]: event.target.value });
    };

    const handleSubmit = async (event) => {
        event.preventDefault();
        try {
            if (!formData.id) {
                const response = await ParkingApi.create(formData);
                setParkings([...parkings, response.data]);
            } else {
                await ParkingApi.update(formData.id, formData);
                const updatedParkings = parkings.map(parking => {
                    if (parking.id === formData.id) {
                        return { ...parking, ...formData };
                    }
                    return parking;
                });
                setParkings(updatedParkings);
            }
            setFormData({
                id: '',
                Capacite: '',
                pannes: '',
                PlaceRestantes: '',
            });
        } catch (error) {
            console.error("Error submitting form:", error);
            setError("Une erreur s'est produite lors de la soumission du formulaire. Veuillez réessayer.");
        }
    };

    const handleDelete = async (id) => {
        try {
            await ParkingApi.delete(id);
            const updatedParkings = parkings.filter(parking => parking.id !== id);
            setParkings(updatedParkings);
        } catch (error) {
            console.error("Error deleting parking:", error);
            setError("Une erreur s'est produite lors de la suppression du parking. Veuillez réessayer.");
        }
    };

    const handleEdit = (parking) => {
        setFormData(parking);
    };

    return (
        <div>
            <form onSubmit={handleSubmit}>
                {error && <div style={{ color: 'red' }}>{error}</div>}
                <div>
                    <label htmlFor="Capacite">Capacité:</label>
                    <input type="number" id="Capacite" name="Capacite" value={formData.Capacite} onChange={handleInput} />
                </div>
                <div>
                    <label htmlFor="pannes">Pannes:</label>
                    <input type="text" id="pannes" name="pannes" value={formData.pannes} onChange={handleInput} />
                </div>
                <div>
                    <label htmlFor="PlaceRestantes">Places Restantes:</label>
                    <input type="number" id="PlaceRestantes" name="PlaceRestantes" value={formData.PlaceRestantes} onChange={handleInput} />
                </div>
                <button type="submit">{formData.id ? "Modifier" : "Ajouter"}</button>
            </form>

            <h2>Liste des parkings</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Capacité</th>
                        <th>Pannes</th>
                        <th>Places Restantes</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {parkings.map((parking) => (
                        <tr key={parking.id}>
                            <td>{parking.id}</td>
                            <td>{parking.Capacite}</td>
                            <td>{parking.pannes}</td>
                            <td>{parking.PlaceRestantes}</td>
                            <td>
                                <button onClick={() => handleEdit(parking)}>Modifier</button>
                                <button onClick={() => handleDelete(parking.id)}>Supprimer</button>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
}

export default Parking;